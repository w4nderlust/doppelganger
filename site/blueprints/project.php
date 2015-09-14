<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
  cover:
    label: Cover Image
    type: selector
    required: true
    mode: single
    types:
      - image
  year:
    label: Year
    type:  number
  client:
    label: Client
    type:  text
    width: 1/2
  client_website:
    label: Client Website
    type:  url
    width: 1/2
  tags:
    label: Tags
    type:  tags
    required: true
  github:
    label: Github URL
    type:  url
  description:
    label: Description
    type:  markdown 
  gallery:
    label: Gallery
    type: selector
    mode: multiple
    types:
      - image
  text:
    label: Text
    type:  markdown
  collaborators:
    label: Collaborators
    type: structure
    entry: >
        {{name}}<br />
        {{url}}
    fields:
      name:
        label: Name
        type: text
      url:
        label: URL
        type: url