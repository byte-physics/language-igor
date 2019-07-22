# igor-linguist-syntax
A syntax highlighting for Igor Pro using textmate language for github linguist

## development

Development is done using [sublime text editor](http://www.sublimetext.com/) with the [guide described here](http://docs.sublimetext.info/en/latest/extensibility/syntaxdefs.html) and the [grammar](https://macromates.com/manual/en/language_grammars) description of textmate. Syntax highlighting was tested using [Neon color scheme](https://github.com/MattDMo/Neon-color-scheme) and activated [ScopeAlways](https://packagecontrol.io/packages/ScopeAlways)

Update linguist using

```sh
script/add-grammar --replace igor-linguist-syntax https://github.com/byte-physics/language-igor
```

## sources

* starting point file (PD) from [the forum](https://www.wavemetrics.com/comment/5280#comment-5280)
* [igor-pro-vim](https://github.com/t-b/igor-pro-vim) package
* [rouge](https://github.com/rouge-ruby/rouge/commit/2ce33dacb63fabefc2a0f16ee834822c001779b9)
