# Crane

## About Crane

A way to manage an organisation's FITs (Facebook, Instagram and Twitter).

A collaborative space for marketing & communications teams to work on, publish and track metrics for social media outreach. 

## Roadmap

### ✅ v0.1 - Minimum Usable Product

- ~~Basic application structure with loose authentication.~~
- ~~Ability to create post; title, content, optional file and approval status.~~
- ~~Ability to comment on posts.~~

### ✅ v0.11 - License & Recording

- ~~Choose a license and open the repository to the public.~~
- ~~Add hotjar website heatmaps~~
- ~~Add sentry.io~~
- ~~Added login/register buttons on the homepage... doh!~~

### 🔨 v0.12 - Channel collections (current)

- Ability to use multiple channels on the platform (different projects, initiatives).
- Posts should be able to post to both singular or multiple channels, and different platforms within each of those.

### v0.2 - User Roles & Platform-Specific Variations

- Limit user registrations to those with @helpinggroup.com.au email addresses and assign User models the verifyEmail contract
- Better way for users to select and edit the datetime for posting schedules (publish_at)
- Indicate which platforms to post on
- Give users the ability to personalise their profile (profile photo, name)
- Comment section will reflect when someone updates a post (updates content, deletes an image, requests, removes and gives a post approval)
- Add the ability to include hashtags to posts.
- Introduce user roles (manager, editor).
- Limit users who can approve posts to those with a 'managers' role.
- Creating custom and varying posts for different platforms.

### v0.3 - API Integration

- Ability to tailor each post to each platform (content, hashtags for linkedin/facebook, image sizes for specific platforms)
- Calendar view on the Collaborate dashboard page.
- Users (managers) can assign other Users roles.
- Scheduled posts will be automatically shared to their respective platforms, given that the post is approved by a manager before the publish date.
- Platforms will include: facebook, twitter, linkedin, instagram

### v0.4 - Metrics / Minimum Viable Product

- Search & filter functionality using Algolia & Laravel Scout
- Ability to visualise and track key metrics across social media platforms; as a whole and per post.

## Resources

### APIs

#### Facebook

- https://www.jcchouinard.com/post-to-groups-using-facebook-graph-api-python/
- https://github.com/facebookarchive/php-graph-sdk/blob/master/docs/reference/Facebook.md
- https://developers.facebook.com/docs/graph-api/using-graph-api#publishing

#### Twitter

- https://developerchirag.medium.com/automate-tweets-on-twitter-using-laravel-queues-jobs-programming-school-ea9b8e4a94f6

#### LinkedIn

- https://artisansweb.net/share-post-on-linkedin-using-linkedin-api-and-php/
