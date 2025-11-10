# Symfony Forms Memory Usage Issue Reproduction

This repository reproduces a significant memory usage issue in Symfony Forms when creating large nested collections with many fields.

## Usage

1. Clone repository
2. Run: `composer install`
3. Run: `php bin/reproduce_memory_issue.php`

## Description

The script creates a deeply nested form structure:
- 1 location containing 20 sublocations
- Each sublocation contains 20 buildings
- Each building contains 101 fields (1 number field + 100 text fields)
- **Total: ~40,400 form fields**

This results in:
- **~463 MB memory increase** during form creation
- **~2.7 seconds** to create the form

The addition of options to the fields in BuildingType (specifically `'attr' => ['foo' => 123]`) significantly contributes to the memory usage.

## Profiling

The standalone script can be used with various profiling tools:

```bash
# Basic run
php reproduce_memory_issue.php
```