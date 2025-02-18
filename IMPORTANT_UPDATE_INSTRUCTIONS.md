# Important Update Instructions

The Google Maps settings save function needs to be updated to properly track and show save status, and handle both AJAX and regular form submissions like the reCAPTCHA implementation.

## Steps to Update

1. Open `app/Controllers/Settings.php`
2. Locate the `save_google_maps_settings()` function
3. Replace the entire function with the content from `updated_google_maps_settings.php`

## Key Changes Made

1. Added `$success` flag to track if all settings saved successfully
2. Added proper checking of `Settings_model->save_setting()` return value
3. Added `isAJAX()` check to handle both AJAX and regular form submissions
4. Added proper success/error message handling
5. Added proper redirect with message for non-AJAX requests

## Verification

After updating:
1. Settings should only show "updated" when actually saved
2. Failed saves should show error message
3. Redirects should work correctly for non-AJAX submissions