window.onload = (e)->
  unless Cookies.get('cookiebar')?
    cookiebar = document.createElement('div')
    cookiebar.classList.add('cookie-bar')
    cookiebar.innerHTML =  minium_app.cookiebar_content + " <a href='#'>" + minium_app.cookiebar_learn_more + "</a> <button id='cookie_btn'>" + minium_app.cookiebar_close + "</button>"
    document.body.appendChild(cookiebar)

    btn = document.querySelector('#cookie_btn')
    btn.addEventListener 'click', (e) ->
      e.preventDefault()
      Cookies.set('cookiebar', 'viewed', { expires: 365 })
      cookiebar.parentElement.removeChild(cookiebar)
