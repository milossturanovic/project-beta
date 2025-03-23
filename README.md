# 📘 Project Beta – Custom WordPress Theme (ACF Blocks & Asset Setup)

This document explains how ACF blocks and assets are set up in the **Project Beta** theme, including automatic block registration, asset loading, and Gutenberg editor styling.

---

### 📁 Block Folder Structure

Each custom ACF block must follow this structure inside `/blocks/{block-name}/`:


- `block.json` defines block metadata and ACF-specific options
- `hero.php` is the template rendered on the frontend
- `hero.css` and `hero.js` are automatically enqueued if present

---

## ⚙️ Dynamic Block Registration

ACF blocks are dynamically registered from the `/blocks/` folder using `acf_register_block_type()`.

**Function (in `functions.php`):**
```php
add_action('acf/init', 'project_beta_register_acf_blocks');

---

## 🧩 How to Add a New Block

1. Create a new folder inside `/blocks/`, e.g. `/blocks/my-block/`
2. Add the following files:
   - `block.json`
   - `my-block.php`
   - `my-block.css` *(optional)*
   - `my-block.js` *(optional)*
3. Ensure `block.json` includes `"name": "acf/my-block"` and `"acf.renderTemplate": "my-block.php"`
4. The block will automatically be registered and available in Gutenberg!

---

## 🎨 Gutenberg Editor Styling

The block editor (Gutenberg) is styled using the following function:

```php
function project_beta_enqueue_editor_assets() {
    wp_enqueue_style('project-beta-editor-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), null, 'all');
    add_editor_style('assets/css/theme.css');
}
add_action('enqueue_block_editor_assets', 'project_beta_enqueue_editor_assets');

---

### ✅ 3. **Font Integration Notes**
Add a quick reminder for how fonts are handled:

```
---

## ✍️ Font Setup

- Fonts are defined in `/assets/css/fonts.css`
- Font files are located in `/assets/fonts/Urbanist/`
- These fonts are loaded both on the frontend and inside Gutenberg

---

## ⚡ Smart Asset Loading

Each block's CSS and JS are only loaded on pages where that block appears.  
This is handled via dynamic block registration and conditional asset enqueueing with `acf_register_block_type()`.

This helps keep frontend performance optimal.
