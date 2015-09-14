<?php if(!defined('KIRBY')) exit ?>

title: Publication
pages: false
files: true
fields:
  title:
    label: Title
    type:  text
  authors:
    label: Authors
    type: text
    required: true
  venue:
    label: Venue
    type: text
    required: true
  year:
    label: Year
    type: number
    required: true
  type:
    label: Type
    type: select
    required: true
    default: conference
    options:
      conference: Conference
      journal: Journal
      chapter: Chapter
      book: Book
  tags:
    label: Tags
    type: tags
    required: true
  paper:
    label: Paper
    type: selector
    mode: single
    types:
      - document
  presentation:
    label: Presentation
    type: selector
    mode: single
    types:
      - document
  bibtex:
    label: Bibtex
    type: url
  github:
    label: GitHub
    type: url
  arxiv:
    label: Arxiv
    type: url