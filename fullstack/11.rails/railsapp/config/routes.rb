Rails.application.routes.draw do
  
  resources :posts do
    resources :comments
  end

  root 'pages#index', as: 'home'
  
  get 'about' => 'pages#about', as: 'about'

  get 'services' => 'pages#services', as: 'services'

  get 'contact' => 'pages#contact', as: 'contact'

  # For details on the DSL available within this file, see https://guides.rubyonrails.org/routing.html
end
