# S01 --- Sprint 01: Data-Driven Blog

## Task 1 --- Blog Data Shape and Acceptance Criteria --- Decision Gate

**Project:** karodev-portfolio\
**Sprint:** S01 --- Sprint 01: Data-Driven Blog\
**Task:** KP-001\
**Owner:** OGHENEKARO CLETUS\
**Status:** Proposed for senior review\
**Implementation status:** Not started

------------------------------------------------------------------------

## 1. Sprint Decision

The blog will be converted from hardcoded page markup into a data-driven
feature.

For this sprint, I choose **database-backed storage using a defined
schema and migrations**.

The blog will have: - a data-driven list page; - a data-driven
single-article page; - working article links; - an intentional empty
state; - an intentional unknown-post state; and - automated tests based
on the acceptance criteria defined in this document.

No CMS or admin interface will be introduced in this sprint.

------------------------------------------------------------------------

## 2. Blog Post Data Shape

A single blog post will contain the following data:

  -----------------------------------------------------------------------
  Field                               Purpose
  ----------------------------------- -----------------------------------
  **Title**                           The title displayed to readers.

  **Description**                     A short summary of what the post is
                                      about, suitable for the blog
                                      list/card.

  **Content / Body**                  The full article content explaining
                                      what the blog post is about.

  **Media**                           Optional image and/or video
                                      associated with the post for
                                      display.

  **Post identifier**                 A stable identifier used to address
                                      one specific article and generate
                                      its article URL.
  -----------------------------------------------------------------------

### Decision on the original "post statistics" idea

The number of posts is **not stored as a field on an individual post**.
It describes the collection of posts rather than one post. If the
application needs the number of posts, it should derive that value from
the available post data.

### Decision on "About the Post" versus "Description"

These are treated as different concepts:

-   **Description** is the short summary shown when posts are listed.
-   **Content / Body** is the complete article.

The separate "About the Post" label is therefore not needed as an
additional field; its purpose is covered by the article body.

------------------------------------------------------------------------

## 3. Where the Data Lives

### Option A --- Database-backed storage using a defined schema and migrations --- CHOSEN

**Advantages** - Fits the existing Laravel application architecture. -
Provides structured records that the application can query for both the
post list and an individual article. - Allows the templates to remain
independent of individual post content. - Makes empty and unknown-post
states explicit query cases that can be tested. - Provides a clear
schema and controlled way to evolve the data structure.

**Trade-offs** - Requires database schema work, migrations, model/query
logic, and test setup. - It is more infrastructure than a small static
data file requires. - Because a CMS is out of scope, adding posts still
requires a developer/data-entry workflow rather than an admin UI.

### Option B --- Reusable Data File

Posts could instead live in a structured application data file and be
loaded by the application.

**Advantages** - Simple for a small, fixed amount of content. - No
database schema or database records are required. - Easy to version with
the application code.

**Trade-offs** - As the number of posts grows, one data file becomes
harder to manage. - Querying, retrieving one post, and handling content
consistently requires additional application logic. - Media references
and structured content can become harder to manage cleanly. - It is less
aligned with the existing Laravel application's data-oriented
architecture.

------------------------------------------------------------------------

## 4. Why the Database Is the Chosen Approach

I chose database-backed storage because it directly supports the
requirements of this sprint.

The requirement is for the posts to become **data-driven**, rather than
being hardcoded into the page templates. A structured database schema
allows the application to retrieve a collection of posts for the list
page and retrieve one post for the article page.

It also supports the required edge cases:

-   there may be zero posts;
-   a requested post may not exist;
-   the application must distinguish valid and invalid post lookups; and
-   tests must prove the resulting behavior.

This approach fits the existing Laravel application and gives a clear
separation between **post data** and **page presentation**.

The trade-off is that database-backed storage introduces more setup than
a reusable data file. For this sprint, I consider that additional
structure justified because the objective is to establish a real
data-driven feature rather than simply replace one block of hardcoded
HTML with another static representation.

A CMS is deliberately not part of this decision. The sprint requires
data-driven content, not an administration interface.

------------------------------------------------------------------------

## 5. How a New Post Will Be Added

Adding a post must not require editing the blog list or article
templates.

The intended developer workflow is:

1.  Ensure the database schema for posts is available through the
    migration.
2.  Add a new post record containing the required post data.
3.  Provide the post's title, description, full content/body, media
    where applicable, and stable identifier.
4.  Save the record in the database.
5.  Open the blog list and verify that the new post appears.
6.  Follow its article link and verify that the corresponding article
    page renders.
7.  No blog page template is edited to make the new post appear.

The sprint does **not** introduce a CMS or admin form for this workflow.

------------------------------------------------------------------------

## 6. Blog Feature Acceptance Criteria

These criteria are defined before implementation.

### AC-01 --- Blog list with posts

**Given** blog posts exist in the data source,\
**when** a visitor opens the blog list page,\
**then** the page displays the available posts with their relevant
information and provides a working way to reach each article.

### AC-02 --- Valid article

**Given** a requested post exists,\
**when** a visitor opens its article URL,\
**then** the application renders the corresponding article and displays
its title, description, full content/body, and associated media when
available.

### AC-03 --- Empty blog

**Given** no blog posts exist,\
**when** a visitor opens the blog list page,\
**then** the application displays a clear, intentional empty-state
message instead of broken or misleading content.

**Expected message:**\
"This page is empty."

The "coming soon" wording is not used because the requirement is to
handle an empty blog, not to imply that the feature has not launched.

### AC-04 --- Unknown post

**Given** the requested post identifier does not match an existing
post,\
**when** a visitor requests that article,\
**then** the application returns an intentional not-found response/page
rather than a broken or empty article page.

**Expected user-facing message:**\
"This page does not exist."

### AC-05 --- No template changes for new posts

**Given** a new post is added as data,\
**when** the blog list is opened,\
**then** the new post appears without modifying the blog list or article
templates.

### AC-06 --- Existing navigation and links

**Given** the existing blog navigation and article links,\
**when** a visitor uses them,\
**then** they resolve to real blog routes rather than dead `#` links or
empty route stubs.

------------------------------------------------------------------------

## 7. Testing Strategy

Testing will be derived directly from the acceptance criteria and
written before implementation.

### List-page test

Prove that: - a blog list request succeeds; - available posts are
rendered from the data source; and - the relevant post information and
article links are present.

### Article-page test

Prove that: - a valid post can be requested through its identifier; -
the correct article is rendered; and - its expected content is present.

### Empty-blog test

Prove that: - when the data source contains no posts; - the blog list
still responds correctly; and - the intentional empty-state message is
displayed.

### Unknown-post test

Prove that: - requesting an identifier that does not exist; - produces
the intended not-found behavior; and - does not render an unrelated or
empty article.

### Data-driven behavior test

Prove the central sprint requirement:

-   add a new post as data;
-   request the blog list;
-   verify the new post appears;
-   without changing the page template.

Tests will be created from the acceptance criteria rather than being
invented after implementation.

------------------------------------------------------------------------

## 8. Scope Boundary

### In scope

-   Blog post data shape.
-   Database-backed post storage.
-   Blog list page.
-   Single article page.
-   Route wiring.
-   Working blog/article links.
-   Empty-blog handling.
-   Unknown-post handling.
-   Tests for the required behaviors.

### Out of scope

-   Authentication.
-   Admin panel or CMS.
-   Converting other KaroDev sections to data-driven features.
-   Blog visual redesign.
-   SEO.
-   Analytics.
-   Performance optimization.
-   Comments or commenting functionality.
-   Changes to Home, Projects, Services, Skills, Experience,
    Certifications, or Contact.

------------------------------------------------------------------------

## 9. Decision Gate

This document is the decision gate for Sprint 01.

**No implementation work should begin until a senior engineer reviews
and agrees with:**

1.  the blog data shape;
2.  the storage decision and trade-offs;
3.  the workflow for adding a post;
4.  the acceptance criteria; and
5.  the testing strategy.

After agreement, implementation can proceed to **Task 2**.

------------------------------------------------------------------------

## Final Decision

**Chosen data storage:** Database-backed storage using a defined schema
and migrations.

**Core principle:** Blog content is data; templates are presentation.

**Sprint goal:** Ship one complete, tested, data-driven blog feature
without introducing a CMS or redesigning the site.
