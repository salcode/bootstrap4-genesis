Bootstrap 4 Genesis
===================

WordPress [Genesis Child Theme](https://my.studiopress.com/themes/genesis/) using [Bootstrap 4](https://getbootstrap.com/docs/4.1/getting-started/introduction/).


## Build Process

This projects uses a build process to:

- convert Sass (`.scss`) into CSS
- combine and compress CSS files

### Initial Setup

Before using this project's build process for the first time you need to run

```
npm install
```

to install all of the necessary dependencies.

### Development

During development, you should run

```
npm watch
```

which will watch for changes in the project and run the necessary build process steps when these changes occur.

### Build Process for Production

When you files are ready for deployment, you should run

```
npm build
```

to build all the necessary files and compress them where approriate.
