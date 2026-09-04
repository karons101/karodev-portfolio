# S01 — Sprint 01: Data-Driven Blog

## Task 1 — Blog Data Shape and Acceptance Criteria — Decision Gate

**Project:** karodev-portfolio
**Sprint:** S01 — Data-Driven Blog
**Task:** KP-001 — Blog Data Shape and Acceptance Criteria
**Owner:** Oghenekaro Cletus
**Status:** Ready for senior review
**Implementation status:** Not started



## 1. Sprint Decision

### 1.1 Starting Point

This decision is based on the current state of the `feature/kp-001-blog-data-shape` branch.

The project already contains:

* a blog_posts database migration;
* a BlogPost model;
* a unique slug column;
* fields for title, excerpt, content, publication state, and other blog metadata;
* existing admin CRUD at /admin/blog-posts.

Therefore, Sprint 01 does **not** need to decide whether blog data should live in a database or in a separate reusable data file. The database-backed structure already exists on the branch.

The remaining decision is how the **public blog read path** will use that existing data.

### 1.2 Chosen Public Read Path

The public blog will read published posts from the existing BlogPost database records.

The public routes will be:

text
GET /blog
GET /blog/{slug}


The public blog list will retrieve published posts from the database.

The article page will retrieve an individual published post using its unique slug.

The public templates will render the data supplied by the application rather than containing hardcoded blog post content.

### 1.3 URL Identifier

The public article identifier is explicitly:


slug


The article URL shape is:


/blog/{slug}


The existing database schema already provides a unique `slug` column, so no additional identifier field is required for Sprint 01.

Example:


/blog/building-a-data-driven-portfolio


---

## 2. Blog Post Data Shape

Sprint 01 requires only the fields necessary to render the public blog.

### 2.1 Required Public Fields

| Field       | Purpose                                                             |
| ----------- | ------------------------------------------------------------------- |
| title     | The title displayed on the blog post                                |
| slug      | The unique public article identifier                                |
| excerpt   | The short description/summary shown on the list and/or article page |
| content   | The complete article body                                           |
| published | Determines whether the post is available through the public blog    |

The existing blog_posts table may contain additional fields such as metadata, tags, featured state, and featured_image. Those fields do not need to be part of the Sprint 01 public rendering requirement.

### 2.2 Media

Media is **not a required part of Sprint 01**.

The current public blog cards do not require images or video for the data-driven implementation.

The existing featured_image column may remain nullable and unused by the Sprint 01 public blog implementation.

Video is not part of the Sprint 01 data shape.

### 2.3 Post Count

The number of posts is not stored as a field on an individual blog post.

The application derives the collection and its count from the database query.

---

## 3. Content Format Decision

### 3.1 Chosen Format

The content column will store **HTML**.

The public article view will render the stored HTML as HTML rather than displaying the markup as plain text.

Example stored content:


<p>This article explains how the portfolio was built.</p>
<p>The implementation uses Laravel and server-rendered views.</p>


The article view will render the content so that the paragraphs are displayed as formatted HTML.

### 3.2 Trust Model

Sprint 01 assumes a **single trusted author** for blog content.

Because the content is authored by the portfolio owner and stored as HTML, Sprint 01 does not introduce a Markdown parser or a separate content-transformation pipeline.

This decision keeps the implementation focused on the sprint goal:

 Retrieve blog content from data and render it through the public blog.

If the application later supports untrusted or multi-user content, content sanitization and a safer authoring pipeline can be evaluated separately.

### 3.3 Alternative Considered: Markdown

Markdown was considered as an alternative content format.

**Advantages:**

* simpler authoring syntax;
* content is easier to read in raw form;
* requires less HTML authoring.

**Disadvantages:**

* requires a Markdown parser;
* introduces an additional rendering dependency;
* adds another transformation step between stored content and displayed content;
* is unnecessary for the current single-author portfolio use case.

**Decision:** HTML is chosen for Sprint 01 because it provides the simplest direct rendering path for the existing application.

---

## 4. Current Blog Posts Entering the Database

The three existing public blog posts must become database records so that the public blog is genuinely data-driven.

### 4.1 Seeder Decision

A dedicated seeder will carry the three current blog posts.

The seeder will be named:


BlogPostSeeder


The three current posts will be represented as records containing, at minimum:

* title;
* slug;
* excerpt;
* content;
* published.

The seeder must use stable, unique slugs that correspond to the public article URLs.

### 4.2 Seeder Execution

After the seeder has been created and the implementation is ready, the database setup will be run with:


php artisan migrate


The blog records will then be inserted with:


php artisan db:seed --class=BlogPostSeeder


The public blog will then be verified at:


/blog


and an individual article will be verified at:


/blog/{slug}


The seeder is responsible for providing the initial three posts. Adding a new post later must not require editing the public Blade templates.

---

## 5. Public Blog Behaviour

### 5.1 Blog List

The public blog list is available at:


GET /blog


It retrieves published blog posts from the database.

Each rendered post must provide a working link to its article URL:


/blog/{slug}


No blog post content should be hardcoded into the public list template.

### 5.2 Individual Article

An individual article is available at:


GET /blog/{slug}


When the slug belongs to a published post, the application returns the article page with:

* the post title;
* the post excerpt/description where applicable;
* the stored HTML content.

### 5.3 Empty State

When there are no published posts, the blog list must remain reachable and display the exact required message:


No posts yet — check back soon.


### 5.4 Unknown Post

When the requested slug does not identify a published post, the application must return an HTTP **404** response.

The page must display:


Post not found


The page must also provide a back link to:


/blog


---

## 6. Acceptance Criteria

### AC-01 — Data-Driven Blog List

**Given** published blog posts exist in the database,

**When** a visitor requests:


GET /blog


**Then** the page renders the published posts from database records.

The posts must not be hardcoded into the Blade template.

Each post must provide a working article link using its slug:


/blog/{slug}


---

### AC-02 — Individual Blog Article

**Given** a published blog post exists with a valid `slug`,

**When** a visitor requests:


GET /blog/{slug}


**Then** the application returns HTTP `200` and renders the post's:

* title;
* excerpt/description where applicable;
* HTML content.

Media is not required for this acceptance criterion.

---

### AC-03 — Empty Blog State

**Given** there are no published blog posts,

**When** a visitor requests:


GET /blog


**Then** the application returns HTTP 200 and displays exactly:


No posts yet — check back soon.


---

### AC-04 — Unknown Blog Post

**Given** the requested slug does not match a published blog post,

**When** a visitor requests:


GET /blog/{slug}


**Then** the application:

1. returns HTTP 404;
2. displays:


Post not found


3. provides a back link to:


/blog


---

### AC-05 — Adding a New Post Requires No Template Change

**Given** a new valid BlogPost record is added to the database,

**When** the post is marked as published,

**Then** it becomes available through the public blog list and its /blog/{slug} article URL without modifying the public blog templates.

The public templates must depend on the blog data shape rather than on a fixed number of posts.

---

### AC-06 — Working Public Navigation

The public blog must provide real working navigation between:


/blog


and:


/blog/{slug}


Every rendered "Read Article" or equivalent article link must resolve to the corresponding post.

No public blog article link may remain a dead or placeholder link.

---

## 7. Testing Strategy

The implementation must include automated feature tests covering the public blog behaviour.

### 7.1 Blog List Test

Verify that:

* /blog returns HTTP 200;
* published posts are rendered;
* the rendered posts originate from database records;
* article links contain the corresponding slugs.

### 7.2 Individual Article Test

Verify that:

* a valid published slug returns HTTP 200;
* the expected title is present;
* the expected excerpt/description is present where applicable;
* the stored HTML content is rendered.

### 7.3 Empty State Test

Verify that:

* /blog returns HTTP 200 when no published posts exist;
* the exact message appears:


No posts yet — check back soon.


### 7.4 Unknown Post Test

Verify that:

* an unknown slug returns HTTP 404;
* "Post not found" is displayed;
* a back link to `/blog` is present.

### 7.5 Data-Driven Test

Verify that adding a new published database record makes that post appear on the public blog without requiring a template change.

### 7.6 Seeder Verification

The BlogPostSeeder must create the three current blog posts with valid unique slugs and published status suitable for public rendering.

---

## 8. Implementation Boundary

Sprint 01 is limited to making the public blog data-driven.

### In scope

* public blog list data retrieval;
* public article data retrieval;
* /blog route;
* /blog/{slug} route;
* use of the existing BlogPost model and database structure;
* the slug identifier;
* HTML content rendering;
* seeding the three existing blog posts;
* empty state;
* 404 state;
* back navigation;
* automated feature tests.

### Out of scope

* authentication changes;
* admin authentication;
* new CMS functionality;
* new admin CRUD screens;
* blog redesign;
* SEO implementation;
* media management;
* video support;
* Markdown support;
* multi-author content;
* converting other portfolio sections to data-driven features.

The existing admin CRUD is not being rebuilt as part of Sprint 01.

---

## 9. Definition of Done for KP-001

KP-001 is complete when:

* the data shape is explicitly defined;
* slug is the agreed public identifier;
* /blog is the agreed public list route;
* /blog/{slug} is the agreed public article route;
* HTML is the agreed content format;
* the three current posts have a defined seeding mechanism;
* the exact seeder execution command is documented;
* empty-state behaviour is defined;
* unknown-post behaviour is defined;
* the required 404 status and back link are defined;
* acceptance criteria are testable;
* the testing strategy is documented;
* the document has been reviewed and agreed by the senior engineer.

No implementation for KP-002 should begin until the senior review gate has been closed.

---

## 10. Senior Engineering Decision Gate

This document is an agreement gate for Sprint 01.

The purpose of the review is to confirm that the implementation decisions are sufficiently precise before coding begins.

The senior reviewer should specifically confirm:

1. The decision starts from the existing database/migration/model/admin state.
2. The public read path is database-backed.
3. slug is the public identifier.
4. The article URL is /blog/{slug}.
5. HTML is the agreed content format.
6. The three current posts will enter the database through BlogPostSeeder.
7. The documented seed commands are sufficient.
8. The empty-state copy is:


No posts yet — check back soon.


9. The unknown-post state returns HTTP 404, displays:


Post not found


and provides a back link to /blog.
10. Media is not a Sprint 01 requirement.
11. The acceptance criteria and testing strategy are sufficiently specific to implement and verify the feature.

Any disagreement must be resolved before KP-001 is considered closed.

---

## 11. Final Decision

Sprint 01 will make the public blog data-driven by reading published BlogPost records from the existing database structure.

The public interface will use:


GET /blog
GET /blog/{slug}


The unique slug field is the public article identifier.

Blog content will be stored as HTML in the existing content field and rendered as HTML for the single trusted author.

The three current blog posts will be inserted through a dedicated BlogPostSeeder.

The implementation will include automated feature tests for:

* the blog list;
* individual articles;
* the empty state;
* unknown posts and 404 behaviour;
* data-driven addition of new posts.

The public blog templates must not require modification when additional blog posts are added.

This decision intentionally keeps Sprint 01 focused on the core requirement: **turn the existing static public blog into a tested, database-driven feature without expanding the sprint into a CMS or redesign.**

---

## Sprint Goal

Ship the blog as a real feature: posts render from data instead of hardcoded HTML, every article is reachable through /blog/{slug}, empty and unknown states behave correctly, and automated tests prove the behaviour.

