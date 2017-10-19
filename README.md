[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/GoogleSlides/functions?utm_source=RapidAPIGitHub_GoogleSlidesFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# GoogleSlides Package
With Google Slides, you can create, edit, collaborate, and present wherever you are. For free.Google Slides makes your ideas shine with a variety of presentation themes, hundreds of fonts, embedded video, animations, and more.Choose from a wide variety of pitches, portfolios and other pre-made presentations — all designed to make your work that much better, and your life that much easier.Access, create, and edit your presentations wherever you go — from your phone, tablet, or computer — even when there’s no connection.
* Domain: [www.google.com](https://www.google.com/slides/about/)
* Credentials: clientId, clientSecret

## How to get credentials: 
0. When you create your application, you register it using the Google API Console. Google then provides information you'll need later, such as a client ID and a client secret.
1. Activate the Google Slides API in the Google API Console. (If the API isn't listed in the API Console, then skip this step)
2. When your application needs access to user data, it asks Google for a particular scope of access.
3. Google displays a consent screen to the user, asking them to authorize your application to request some of their data.
4. If the user approves, then Google gives your application a short-lived access token.
 
## GoogleSlides.getAccessToken
Get AccessToken.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client ID
| clientSecret| credentials| Client secret
| code        | String     | Code you received from Google after the user granted access
| redirectUri | String     | The same redirect URL as in received Code step.

## GoogleSlides.refreshToken
Get new accessToken by refreshToken.

| Field       | Type       | Description
|-------------|------------|----------
| clientId    | credentials| Client ID
| clientSecret| credentials| Client secret
| refreshToken| String     | A token that you can use to obtain a new access token. Refresh tokens are valid until the user revokes access. Again, this field is only present in this response if you set the access_type parameter to offline in the initial request to Google's authorization server.

## GoogleSlides.revokeAccessToken
In some cases a user may wish to revoke access given to an application. A user can revoke access by visiting Account Settings. It is also possible for an application to programmatically revoke the access given to it. Programmatic revocation is important in instances where a user unsubscribes or removes an application. In other words, part of the removal process can include an API request to ensure the permissions granted to the application are removed.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| The token can be an access token or a refresh token. If the token is an access token and it has a corresponding refresh token, the refresh token will also be revoked.

## GoogleSlides.getPresentation
Gets the latest version of the specified presentation.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access Token. Use getAccessToken to get it.
| presentationId| String| The ID of the presentation to retrieve.

## GoogleSlides.getPresentationPages
Gets the latest version of the specified page in the presentation.

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access Token. Use getAccessToken to get it.
| presentationId| String| The ID of the presentation to retrieve.
| pageObjectId  | String| The object ID of the page to retrieve.

## GoogleSlides.createPresentation
Creates a new presentation using the title given in the request. Other fields in the request are ignored. Returns the created presentation.Also see [google guide](https://developers.google.com/slides/how-tos/overview) and [documentation](https://developers.google.com/slides/reference/rest/v1/presentations/create).

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Access Token. Use getAccessToken to get it.
| pageSize   | JSON  | The size of pages in the presentation.See more info [here](https://developers.google.com/slides/reference/rest/v1/presentations/create).
| slides     | List  | The slides in the presentation. A slide inherits properties from a slide layout. See more info [here](https://developers.google.com/slides/reference/rest/v1/presentations.pages#Page)
| title      | String| The title of the presentation.
| masters    | List  | The slide masters in the presentation. A slide master contains all common page elements and the common properties for a set of layouts.
| layouts    | List  | The layouts in the presentation. A layout is a template that determines how content is arranged and styled on the slides that inherit from that layout.
| locale     | String| The locale of the presentation, as an IETF BCP 47 language tag.
| revisionId | String| The revision ID of the presentation. Can be used in update requests to assert that the presentation revision hasn't changed since the last read operation. Only populated if the user has edit access to the presentation.The format of the revision ID may change over time, so it should be treated opaquely. A returned revision ID is only guaranteed to be valid for 24 hours after it has been returned and cannot be shared across users. If the revision ID is unchanged between calls, then the presentation has not changed. Conversely, a changed ID (for the same presentation and user) usually means the presentation has been updated; however, a changed ID can also be due to internal factors such as ID format changes.
| notesMaster| List  | The notes master in the presentation. It serves three purposes: - Placeholder shapes on a notes master contain the default text styles and shape properties of all placeholder shapes on notes pages. - Specifically, a SLIDE_IMAGE placeholder shape contains the slide thumbnail, and a BODY placeholder shape contains the speaker notes. - The notes master page properties define the common page properties inherited by all notes pages. - Any other shapes on the notes master will appear on all notes pages.




## GoogleSlides.getPagesThumbnails
Generates a thumbnail of the latest version of the specified page in the presentation and returns a URL to the thumbnail image.

| Field                           | Type  | Description
|---------------------------------|-------|----------
| accessToken                     | String| Access Token. Use getAccessToken to get it.
| presentationId                  | String| The ID of the presentation to retrieve.
| pageObjectId                    | String| The object ID of the page to retrieve.
| thumbnailPropertiesMimeType     | String| The optional mime type of the thumbnail image.If you don't specify the mime type, the default mime type will be PNG.
| thumbnailPropertiesThumbnailSize| Select| The predefined thumbnail image sizes.THUMBNAIL_SIZE_UNSPECIFIED - The default thumbnail image size.The unspecified thumbnail size implies that the server chooses the size of the image in a way that might vary in the future.large - The thumbnail image width of 1600px.

## GoogleSlides.updatePresentation
Applies one or more updates to the presentation.Each request is validated before being applied. If any request is not valid, then the entire request will fail and nothing will be applied.Some requests have replies to give you some information about how they are applied. Other requests do not need to return information; these each return an empty reply. The order of replies matches that of the requests.For example, suppose you call batchUpdate with four updates, and only the third one returns information. The response would have two empty replies: the reply to the third request, and another empty reply, in that order.Because other users may be editing the presentation, the presentation might not exactly reflect your changes: your changes may be altered with respect to collaborator changes. If there are no collaborators, the presentation should reflect your changes. In any case, the updates in your request are guaranteed to be applied together atomically.More info [here](https://developers.google.com/slides/reference/rest/v1/presentations/batchUpdate    ).

| Field         | Type  | Description
|---------------|-------|----------
| accessToken   | String| Access Token. Use getAccessToken to get it.
| presentationId| String| The ID of the presentation to update.
| requests      | List  | A list of updates to apply to the presentation.All possible [objects](https://developers.google.com/slides/reference/rest/v1/presentations/request#Request).
| writeControl  | JSON  | Provides control over how write requests are executed. More info [here](https://developers.google.com/slides/reference/rest/v1/presentations/batchUpdate#WriteControl).


#### Example for requests field

```
Create empty text box.

{
  "createShape": {
    "objectId": "{randomInt}",
    "shapeType": "TEXT_BOX",
    "elementProperties": {
      "pageObjectId": "p",
      "size": {
        "height": {  
        	"magnitude": 350,
			"unit": "PT"
        	
        },
        "width": {  
        	"magnitude": 350,
			"unit": "PT"
        	
        }
      },
      "transform": {
        "scaleX": 1,
        "scaleY": 1,
        "translateX": 350,
        "translateY": 100,
        "unit":"PT"
      }
    }
  }
}
```

