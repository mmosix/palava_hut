# Adding New Menu Items

To add new menu items in the simplest way:

1. Create a new menu item array in `app/Database/Seeds/DefaultMenuSeeder.php` with this structure:

```php
array(
    "name" => "your_menu_item",
    "url" => "your_menu_url",
    "icon" => "menu-icon-class",
    "is_custom_menu_item" => false,
    "open_in_new_tab" => false,
)
```

2. Run the seeder using:
```bash
php spark db:seed DefaultMenuSeeder
```

The menu item will be automatically added to the left menu. The system is designed to preserve existing menu items while adding new ones.