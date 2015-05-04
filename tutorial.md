


<b>Installing Forem gem in a Rails App</b>
=============================

<b>Introduction</b>
--------------------

<h4>What is forem?</h4>
Forem is an engine for rails application that provides a simple forum system. The basic functionalities include forums, topics, and posts. As of now, Forem is actively being developed and has no stable version. 

----------

Installation
-------------

Install these gems in your application. A way to do this is to edit the Gemfile of your application and run bundle install. 

If you are using Rails 3:
>  gem 'forem', :github => "radar/forem", :branch => "rails3"

If you are using Rails 4:
> gem 'forem', :github => "radar/forem", :branch => "rails4"

For theme/style, install the following gems:
>gem 'forem-bootstrap', github: "radar/forem-bootstrap"
>gem 'forem-redcarpet', :git => "git://github.com/radar/forem-redcarpet"

For pagination:
>gem 'will_paginate', '3.0.5'
>or
>gem 'kaminari'

<h4><strong>Setting up Authentication</strong></h4>
For user authentication, Forem let you choose any system or you can develop your own. One option is to use Devise. It is a great authentication system developed by Plataformatec. Integrating Devise in a rails application is very easy. 

To install Devise; include this gem in the Gemfile and run bundle install. 
>gem 'devise'

Now run the Devise generator on command line:
>rails generate devise:install

After the installation, you will be presented with the following screen. Please make sure to do this setup if you have not done already.

![Devise Set up ](http://drive.google.com/uc?export=view&id=0B5hPtk8a_KEkOFlIRFhSc281eDg)

Now prepare the model and run the migrations :
> rails generate devise User
> rake db:migrate

To copy Devise views (for customization), run this command:
> rails g devise:views

<h4><strong>Installing Forem</strong></h4>
Now run the installer to install forem and answer any questions that are prompted. :
> rails g forem:install

Remove public/index.html in your application, if you have not done it already.

To make Forem's forum list the root path of your application add these lines of code in routes.rb:

> mount Forem::Engine, :at => "/"
> root :to => "forem/forums#index"


![Display on Command line ](http://drive.google.com/uc?export=view&id=0B5hPtk8a_KEkRUxVdTlHN0ktZUk)
 
<h4><strong>Setting up Administration</strong></h4>

Forem does not come with a set header, you can customize it in your application in any way you want. For a demo; you can just use the following code:

In application.html.erb:


```
<header>
  <nav>
    <% if user_signed_in? %>
      <%= link_to current_user.email, main_app.edit_user_registration_path %>
      | <%= link_to "Sign out", main_app.destroy_user_session_path, :method => :delete %>
      <% if current_user.forem_admin %>
          | <%= link_to "Administrate", forem.admin_root_url %>
      <% end %>
    <% else %>
      <%= link_to "Sign up", main_app.new_user_registration_path %>
      | <%= link_to "Sign in", main_app.new_user_session_path %>
    <% end %>
  </nav>
</header>
``` 

![Display on Command line ](http://drive.google.com/uc?export=view&id=0B5hPtk8a_KEkNS1LR2hUSHJtdGc)

Now, to set up forem, you need to add methods in your user.rb:
For example, to display email add of user: 
```
def forem_email
    email_address
end
```


Now open up initializers/forem.rb and add the following lines of code:

```
Rails.application.config.to_prepare do
  Forem.layout = "application"
end
```
  
Open up vendor/assets/javascripts/forem.coffee.js and remove the following line of code:
> //= require jquery

<h4><strong>Basic Forem Assets & Themes </strong></h4>

To load javascript files, add this line to your application.js file 

> //= require forem


For styling, add this line to your application.css:

>  *= require 'forem/base'

In your vendor/assets/stylesheets/forem.css.scss; add this line to 

>@import 'forem-bootstrap';

This will import Bootstrap theme for Forem in your application. We have already added the bootrstrap gem for forem in our Gemfile in the beginning. 

![Display on Command line ](http://drive.google.com/uc?export=view&id=0B5hPtk8a_KEkdDRlbzFZUkR2UDg)


![Display on Command line ](http://drive.google.com/uc?export=view&id=0B5hPtk8a_KEkUW1vd01rd3VKNzg)



