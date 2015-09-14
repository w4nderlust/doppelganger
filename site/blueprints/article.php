<?php if(!defined('KIRBY')) exit ?>

title: Blog Article
pages: false
files: true
fields:
  title:
    label: Title
    type: title
  date:
    label: Date
    type: date
    width: 1/2
    default: today
  author:
    label: Author
    type: user
    width: 1/2
  tags:
    label: Tags
    type: tags
    required: true
  text:
    label: Text
    type: markdown