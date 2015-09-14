<?php if(!defined('KIRBY')) exit ?>

title: About
pages: false
files: true
fields:
  title:
    label: Title
    type: text
  name:
    label: Name
    type:  text
    required: true
  profile_image:
    label: Profile Image
    type: selector
    mode: single
    types:
      - image
  street:
    label: Street
    type: text
  zip:
    label: ZIP
    type: number
    width: 1/4
  location:
    label: Location
    type: text
    width: 2/4
  country:
    label: Country
    type: text
    width: 1/4
  phone:
    label: Phone
    type: tel
    width: 1/2
  email:
    label: Email
    type: email
    width: 1/2
  facebook:
    label: Facebook
    type: url
    width: 1/2
  twitter:
    label: Twitter
    type: text
    placeholder: @
    icon: twitter
    width: 1/2
  dblp:
    label: DBLP
    type: url
    width: 1/2
  research_gate:
    label: Research Gate
    type: url
    width: 1/2
  google_scholar:
    label: Google Scholar
    type: url
    width: 1/2
  arxiv:
    label: arXiv
    type: url
    width: 1/2
  linkedin:
    label: LinkedIn
    type: url
    width: 1/2
  biography:
    label: Biography
    type: markdown
  curriculum:
    label: Curriculum Vitae
    type: selector
    mode: single
    types:
      - document
  experience:
    label: Experience
    type: structure
    entry: >
        {{role}} @ {{company}} ({{start_date}} - {{end_date}})<br />
        {{description}}
    fields:
      role:
        label: Role
        type: text
        required: true
      company:
        label: Company
        type: text
        required: true
      start_date:
        label: Start Date
        type: date
      end_date:
        label: End Date
        type: date
      description:
        label: Description
        type: markdown
  education:
    label: Education
    type: structure
    entry: >
        {{degree}} {{institution}} {{end_date}}</br>
        {{notes}}
    fields:
      degree:
        label: Degree
        type: text
      institution:
        label: Institution
        type: text
        required: true
      end_date:
        label: End Date
        type: date
      notes:
        label: Notes
        type: markdown
  skills:
    label: Skills
    type: structure
    entry: >
        {{skill}} {{score}}</br>
        {{description}}
    fields:
      skill:
        label: Skill
        type: text
        required: true
      score:
        label: Score
        type: number
      description:
        label: Description
        type: markdown
  interests:
    label: Interests
    type: structure
    entry: >
        {{interest}}</br>
        {{description}}
    fields:
      interest:
        label: Interest
        type: text
        required: true
      description:
        label: Description
        type: markdown