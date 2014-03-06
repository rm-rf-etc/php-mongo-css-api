php-mongo-css-api
=================

Prototype / Demo of a mongo-based API for saving and updating dynamic documents (of CSS).

### Features currently implemented: ###

- Post requests will add new records or do updates for given properties which are included in the post data.
- Get requests use the route convention /{collection_name}/{document_id} to retrieve documents as JSON.

### Design Philosophy ###

- Thin controllers, using other objects under services (the service providers) to enact instructions.
- Declarative routes in a single location.

### Overview of Approach / Solution ###

Request was to demonstrate how an API might be architected for an application which must provide a dynamic CSS for widgets,
using mongodb. The chosen solution is maximally flexible for a project which could grow to provide additional features,
such as complete CSS overrides (where the client provides their own CSS), or to allow configuration of individual style
properties, which might be done through a frontend UI.
