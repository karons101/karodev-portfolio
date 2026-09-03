# S01 — Sprint 01: Data-Driven Blog

## Task 1 — Blog Data Shape and Acceptance Criteria — Decision Gate

**Project:** karodev-portfolio  
**Sprint:** S01 — Sprint 01: Data-Driven Blog  
**Task:** KP-001  
**Owner:** OGHENEKARO CLETUS  
**Status:** Proposed for senior review  
**Implementation status:** Not started

## Blog Data Shape and Acceptance Criteria

## 1. Purpose

This document defines the data shape, public read path, content format, acceptance criteria, and testing strategy for the Sprint 01 data-driven blog feature.

The purpose of this sprint is to make the existing public blog render from stored data rather than hardcoded page markup.

The existing branch already contains database-backed blog infrastructure, including:

- a `blog_posts` database table and migration;
- a `BlogPost` model;
- existing admin CRUD for blog posts.

Therefore, this sprint does not introduce a new blog database architecture. The decision at this gate is how the existing blog data is used by the public-facing blog.

---

## 2. Blog Data Shape

For the public blog feature, each post requires:

| Field | Purpose |
|---|---|
| `title` | The displayed title of the blog post. |
| `slug` | The unique identifier used in the public article URL. |
| `excerpt` | A short summary displayed on the blog listing. |
| `content` | The full article body. |
| `published` | Determines whether the post is available through the public blog. |

The existing database schema contains additional fields, including category, featured image, metadata, featured status, and tags. Those fields remain part of the existing schema but are not required for the Sprint 01 public blog implementation.

`featured_image` may remain nullable, but media is not part of the required Sprint 01 blog data shape. Video is not part of the existing schema and is not added in this sprint.

### Post identifier and URL

The post identifier for public article pages is the `slug`.

Each slug is unique.

The public article URL is:

```text
/blog/{slug}