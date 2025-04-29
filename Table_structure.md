Table | Key Columns | Notes
users | id, name, email, password, last_login_at | For admin login
social_links | id, platform, url | Manage social media links
categories | id, name, type (product, service, project) | Dynamic type field
products | id, category_id, title, description, photos (JSON), facilities (TEXT/JSON), seo_title, seo_keywords | 
services | id, category_id, title, description, photos (JSON), facilities (TEXT/JSON), seo_title, seo_keywords | 
projects | id, category_id, title, description, photos (JSON), facilities (TEXT/JSON), seo_title, seo_keywords | 
testimonials | id, client_name, feedback, photo (optional) | Converted from enquiries
photo_gallery | id, title, photo_path | Gallery Management
awards | id, title, description, photo_path | Awards/Certificates
enquiries | id, name, email, phone, message, created_at | Contact form submissions
sliders | id, title, subtitle (optional), image_path, link (optional) | Home page sliders
seo_settings | id, page_name, meta_title, meta_keywords, meta_description, geo_location | Per page SEO
blogs | id, title, slug, content, feature_image, seo_title, seo_keywords, seo_description | Blog Management
steel_rates | id, product_id, steel_rate_value, effective_date | Steel price for products