# WordPress block-theme reference

Use this file as a focused checklist when working on this repository. The root `AGENTS.md` contains the general rules.

## Expected theme shape

```text
theme/
├── assets/       # optional fonts, images, and scripts
├── docs/         # documentation
├── parts/        # header, footer, sidebar, and other template parts
├── patterns/     # reusable block patterns
├── styles/       # optional style variations
├── templates/    # index, single, page, archive, search, 404, etc.
├── functions.php # minimal PHP bootstrap and hooks
├── style.css     # theme metadata and only necessary global CSS
└── theme.json    # settings, styles, and design tokens
```

Do not create every directory just because it appears in this example. Add files when a real requirement calls for them.

## Implementation preferences

1. Configure a token or block style in `theme.json`.
2. Compose core blocks in a template, template part, or pattern.
3. i18n must be supported. While basic language is English, the translation to Russian must be created as well.
4. Add a style variation when the change is a coherent alternate visual system.
5. Add CSS for behavior or visual details that `theme.json` cannot express.
6. Add PHP or JavaScript only for behavior that cannot be expressed by the block editor and core blocks.

When creating a pattern, include a descriptive title, a stable slug, appropriate categories, and `Inserter` behavior that matches the intended audience. Keep pattern content portable and avoid site-specific IDs or URLs unless the pattern is explicitly site-specific.

## Content and template coverage

Keep the primary reading experience coherent across:

- blog index and archive views;
- single posts and pages;
- search results;
- the 404 template;
- header/navigation and footer template parts;
- states without featured images, excerpts, authors, or comments.

Use the Query Loop block for collections unless a custom query is genuinely required. Make pagination and empty states explicit.
