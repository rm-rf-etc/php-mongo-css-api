php-mongo-css-api
=================

Prototype / Demo of a mongo-based API for saving and updating dynamic documents (of CSS).

### Features currently implemented: ###

- GET & POST requests use the route convention /{collection_name}/{document_id} to access documents.
- GET requests will return JSON for a given document.
- POST requests will add new records or do updates for given selectors which are included in the post data.

### Design Philosophy ###

- Thin controllers, using other objects under services (the service providers) to enact instructions.
- Declarative routes in a single location.

### Overview of Approach / Solution ###

Request was to demonstrate how an API might be architected for an application which must provide a dynamic CSS for
widgets, using mongodb. The chosen solution is maximally flexible for a project which could grow to provide additional features, such as complete CSS overrides (where the client provides their own CSS), or to allow configuration of individual selectors, which might be done through a frontend UI.

The intended use is that the CSS selector is passed (as a URL escaped string) as a POST parameter, and its value is the sequence of CSS properties with their values.

All tests have been done under the assumption that a certain ID is known. This ID would be stored somewhere with the user's account data.

Yet to be implemented:  
1. Additional logic could be added to translate the string of CSS into a JS object before writing to the DB.
2. Sub-routes could then be added to allow updating or fetching of values of individual properties for a given selector.
