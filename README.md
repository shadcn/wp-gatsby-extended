# wp-gatsby-extended

Extends the WPGatsby WordPress plugin with custom GraphQL Types.

⚠️ Work in Progress. Check https://twitter.com/arshadcn for updates.

## Usage

```js
query {
  wp {
    generalSettings {
      title
      url
    }
    customizerSettings {
      backgroundColor
      respectUserColorPreference
    }
  }
}
```

See also https://github.com/arshad/gatsby-theme-twentytwentyone
