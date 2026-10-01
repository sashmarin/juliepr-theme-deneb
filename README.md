# Juliepr Theme Deneb – A Wordpress Blog Theme

A modern WordPress block theme for a personal blog with i18n and light/dark color modes support.
It was designed for https://julie-pr.blog website, but if you like it - feel free to clone and modify.

The theme outputs canonical links for the posts index (including a homepage
showing latest posts or a separate posts page), category, tag, taxonomy, post type,
author, and year/month/day archives, preserving pagination and omitting extra request parameters.
This output is enabled by default and can be disabled under Appearance → Theme Settings
by unchecking “Output canonical links for archives and the posts index”.
It defers to Yoast SEO, Rank Math, All in One SEO, SEOPress, and The SEO Framework
when detected. Other integrations can disable theme output by returning `false`
from the `juliepr_theme_deneb_archive_canonical_url` filter.
