-- Create project_inquiries table
CREATE TABLE `project_inquiries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `inquiry_type` enum('planned','custom') NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Insert notification setting
INSERT INTO notification_settings (
  notification_type, 
  enable_email, 
  enable_web, 
  enable_slack, 
  notify_to_admins, 
  notify_to_team_members, 
  sort
) VALUES (
  'new_project_inquiry',
  1,
  1, 
  0,
  1,
  0,
  1
);

-- General Information Fields
INSERT INTO `custom_fields` (`title`, `title_language_key`, `related_to`, `field_type`, `options`, `required`, `show_in_table`) VALUES 
('Full Name', 'full_name', 'project_inquiries', 'text', '', 1, 1),
('Email Address', 'email_address', 'project_inquiries', 'email', '', 1, 1),
('Phone Number', 'phone_number', 'project_inquiries', 'text', '', 0, 1),
('Preferred Contact Method', 'preferred_contact_method', 'project_inquiries', 'select', 'email,phone', 1, 1),
('Country of Residence', 'country_of_residence', 'project_inquiries', 'select', 'Kenya,Uganda,Tanzania,Rwanda,Ethiopia,Nigeria,Ghana,South Africa', 1, 1),
('Purpose of Property', 'property_purpose', 'project_inquiries', 'select', 'Personal Use,Investment,Both', 1, 1),
('Preferred Property Location', 'preferred_property_location', 'project_inquiries', 'text', '', 1, 1);

-- Planned Development Fields
INSERT INTO `custom_fields` (`title`, `title_language_key`, `related_to`, `field_type`, `options`, `required`, `show_in_table`) VALUES 
('Preferred Development', 'preferred_development', 'project_inquiries', 'select', 'Development A,Development B,Development C', 1, 1),
('Property Type', 'property_type', 'project_inquiries', 'select', 'Single-Family Home,Townhouse,Apartment', 1, 1),
('Preferred Size', 'preferred_size', 'project_inquiries', 'select', '2 Bedrooms,3 Bedrooms,4+ Bedrooms', 1, 1),
('Additional Features', 'additional_features', 'project_inquiries', 'multi_select', 'Pool,Outdoor Space,Garden,Garage,Security System', 0, 1),
('Budget Range (Planned)', 'budget_range', 'project_inquiries', 'select', 'Under $100k,$100k-$200k,$200k-$300k,$300k-$500k,$500k+', 1, 1);

-- Custom Build Fields
INSERT INTO `custom_fields` (`title`, `title_language_key`, `related_to`, `field_type`, `options`, `required`, `show_in_table`) VALUES 
('Property Location', 'property_location', 'project_inquiries', 'textarea', '', 1, 1),
('Plot Size', 'plot_size', 'project_inquiries', 'text', '', 1, 1),
('Property Style', 'property_style', 'project_inquiries', 'select', 'Modern,Traditional,Minimalist,Contemporary,Mediterranean', 1, 1),
('Number of Bedrooms/Bathrooms', 'bedrooms_bathrooms', 'project_inquiries', 'text', '', 1, 1),
('Specific Features', 'specific_features', 'project_inquiries', 'multi_select', 'Solar Power,Smart Home Tech,Gym,Pool,Home Office,Wine Cellar,Home Theater', 0, 1),
('Budget Range (Custom)', 'budget_range_custom', 'project_inquiries', 'select', 'Under $200k,$200k-$400k,$400k-$600k,$600k-$1M,$1M+', 1, 1),
('Expected Timeline', 'expected_timeline', 'project_inquiries', 'select', '6 months,12 months,18 months,24+ months', 1, 1);

-- Optional Fields
INSERT INTO `custom_fields` (`title`, `title_language_key`, `related_to`, `field_type`, `options`, `required`, `show_in_table`) VALUES 
('Interest in Financing', 'financing_interest', 'project_inquiries', 'select', 'Yes,No', 0, 1),
('Additional Notes', 'additional_notes', 'project_inquiries', 'textarea', '', 0, 1);