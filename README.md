# Shoe Collection

A Laravel 12 application for managing a shoe collection. It allows users to view, add, edit, filter, and delete shoe records. It also uses categories through an Eloquent relationship.

## Laboratory Activity 11 — Finish Your Own CRUD

### Features
- Display the shoe collection.
- Add new shoe records.
- View individual shoe details.
- Edit existing shoe records.
- Delete shoe records.
- Filter shoes by category and brand.
- Use route model binding for CRUD operations.

## Part G — Guide Questions

### G1. What two things are needed for route model binding? What happens if only one is correct?

Route model binding requires the model to be type-hinted in the controller method and the parameter name to match the route parameter. If only one is correct, Laravel may not resolve the model automatically, which can cause an error or incorrect parameter handling.

### G2. Why does a Delete link open the detail page instead of deleting the record?

An ordinary HTML link sends a GET request, not a DELETE request. Since the GET request matches the shoe detail route, Laravel opens the detail page instead of deleting the record. A DELETE form with `@csrf` and `@method('DELETE')` is needed to perform deletion.

### G3. What does the second argument of old() do?

The second argument of `old()` provides a fallback value when there is no previous input. In the edit form, it displays the existing shoe information when the page first loads, while preserving the user's entered values after validation fails.

## Technologies Used
- Laravel 12
- PHP
- SQLite
- Blade
- Bootstrap

## Author
Trisha Ivy Gempis