<?php if(!defined('KIRBY')) exit ?>

title: Lecture
pages: false
files: true
fields:
  title:
    label: Title
    type: title
  cover:
    label: Cover Image
    type: selector
    required: true
    mode: single
    types:
      - image
  date:
    label: Date
    type: date
    width: 1/2
    default: today
  slides:
    label: Slides
    type: selector
    width: 1/2
    mode: single
    types:
      - document
  tags:
    label: Tags
    type: tags
    required: true
  gallery:
    label: Gallery
    type: selector
    mode: multiple
    types:
      - image
  text:
    label: Text
    type: markdown