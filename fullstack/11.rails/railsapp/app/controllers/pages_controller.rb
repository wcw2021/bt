class PagesController < ApplicationController
  def index
    @title = 'Welcome'
		@content = 'Welcome To the homepage'
  end

  def about
    @title = 'About'
		@content = 'Welcome To the about page'
  end

  def services
    @title = 'Services'
    @content = 'Welcome To the services page'
    @services = ['Web Design', 'Web Dev', 'SEO']
  end

  def contact
    @title = 'Contact'
		@content = 'filling form'
  end
end
