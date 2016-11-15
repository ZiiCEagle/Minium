hljs.initHighlightingOnLoad()

links = document.querySelectorAll('.article-summary a')

for link in links
  link.addEventListener 'click', (e) ->
    e.preventDefault()
    Jump e.target.hash,
      duration: 500,
      offset: -10
