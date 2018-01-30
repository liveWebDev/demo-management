# [Primer - Angular 2 Material Admin template](https://themeforest.net/user/iamnyasha)


### Changelog
***

#### `2.0.0` (2017-04-10)
***

##### Fixes
* datatable vertical scroll height
* datatable fullscreen width
* Auth layout z-index issue
* Minor angular 4 fixes
* css theming imports fix (angular material 2 beta.3)
* perfect-scrollbar layout fix (angular material 2 beta.3)

##### Features
* Update to angular-cli v1
* Update to angular 4
* Update to angular material 2 beta.3
* Add chips demo


##### Misc
* change deprecated <template> to <ng-template>
* change deprecated <md-progress-circle> to <md-progress-spinner>


#### Minimum Requirements After Update
* angular-cli v1
* angular 4
* angular material 2 beta.3




#### `1.5.0` (2017-03-19)
***

##### Fixes
* general RTL bug fixes
* fixes card-actions margins

##### Features
* Add collapse menu layout
* Add compact menu layout
* Add pricing tables



#### `1.4.0` (2017-03-01)
***

##### Fixes
* md-select font sizing and padding [commit log](https://github.com/iamnyasha/primer/commit/93e42cdc74786da9d254fd771ae7d118e6ddc697)
* fix vertical scrollbars on some pages [commit log](https://github.com/iamnyasha/primer/commit/38734631d7f008a1c53e24e9a81a2d3eb887b40a)

##### Breaking Changes
* Upgrade to angular-cli RC0 [commit log](https://github.com/iamnyasha/primer/commit/9ad7700d209aa81324ee1b0f097a7c276bbc7aee)
* refactor template specific .md-* classes to .mat-* [commit log](https://github.com/iamnyasha/primer/commit/77e8f6f3bf0cc00c624a8ab10c978dffae3b9d1f)




#### `1.3.0` (2017-02-19)
***

##### Features
* Added angular 2 material autocomplete example
* Template now passes ng lint test


##### Breaking Changes
* Update to angular-cli 1.0.0.beta-32.3 (see official changelog, comes with a lot of scss changes)
* Update to angular 2 material beta.2 (see official changelog)
* Update to angular-calendar 0.7.2 (see calendar example files for all the changes made)
* Refactored accordion directives to use attributes instead of css selectors. Files affected are admin/admin-layout.component.html and apps/mail/mail.component.html . 
  * .accordion changed to appAccordion
  * .accordion-toggle changed to appAccordionToggle
  * .accordion-link changed to appAccordionLink

##### Misc
* Refactored all *.ts and *.html files so that `ng lint` passes (also makes a lot of changes to .ts files)
* Fix errors thrown on ng test
* Updated all other packages in package.json to their latest versions


##### Updating
This update contains a number of breaking changes. The best way to update is to check your files against the commit log and make the necessary changes on your project files. If you don't have github access then get in touch via the themeforest profile page. Also refer to [angular-cli changelog](https://github.com/angular/angular-cli/blob/master/CHANGELOG.md) and [angular 2 material changelog](https://github.com/angular/material2/blob/master/CHANGELOG.md) for further information.

#### Minimum Requirements After Update
* angular-cli 1.0.0.beta-32
* node 6.9+


#### `1.2.0` (2017-02-09)
***

##### Features
* Add boxed layout
* Add custom scrollbars using perfect-scollbar plugin

##### Misc
* Update packages in package.json



#### `1.1.3` (2017-01-20)
***

##### Bug Fixes
* Fix android browser compatibility issue [package.json, polyfills.ts]

##### Misc
* Update package.json

##### Updating
Update your package.json and src/polyfills.ts files with the one from the update and then update your npm packages.


#### `1.1.2` (2017-01-17)
***

##### Bug Fixes
* Fix some color issues in dark mode [scss]
* Fix sidebar scrolling padding issue [scss]
* Fix timeline page RTL layout [scss]

##### Misc
* Update package.json

##### Updating
Only scss changes in this update so you can go ahead and replace your assets/scss/ folder with the updated one.



#### `1.1.1` (2017-01-09)
***

##### Bug Fixes
* Fix spacing bug in scss [scss]
* Fix header spacing alignment [scss]

##### Misc
* Update package.json

##### Updating
Only scss changes in this update so you can go ahead and replace your assets/scss/ folder with the updated one.


#### `1.1.0` (2017-01-03)
***

##### Bug Fixes
* Responsive layout fixes for fullcalendar 

##### Features
* Added dynamic menu

##### Misc
* Refactor responsive admin layout, calendar page and messages page
* Add menu-items and fullscreen toggle directive to shared module
* Moved admin-layout and auth-layout components to layout folder
* Updated node packages
* Minor code cleanup


#### `1.0` (2017-01-03)
***

Initial release