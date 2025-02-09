<div class="sidebar">
    <?php
    // Ensure $menu_items is defined
    $menu_items = isset($menu_items) ? $menu_items : [];
    // Ensure $left_menu is defined and is an object
    $left_menu = isset($left_menu) && is_object($left_menu) ? $left_menu : null;

    $user = isset($login_user) ? $login_user->id : 0;
    $dashboard_link = get_uri("dashboard");

    $user_dashboard = get_setting("user_" . $user . "_dashboard");
    $menu = is_array($menu_items) ? $menu_items : json_decode(json_encode($menu_items), true); // Convert stdClass to array

    if (empty($menu)) {
        if (isset($type) && $type == "client_default") {
            $menu = json_decode(get_setting("default_client_left_menu"), true);
        } else {
            $menu = json_decode(get_setting("default_left_menu"), true);
        }
    }

    // Add core menu items if empty
    if (empty($menu)) {
        $menu = \Config\LeftMenu::get_admin_left_menu();
    }

    if ($user_dashboard) {
        $dashboard_link = get_uri("dashboard/view/" . $user_dashboard);
    }

    // Make sure we have the project inquiry menu item
    if (!empty($menu) && is_array($menu)) {
        $has_project_inquiry = false;
        foreach ($menu as $item) {
            if ($item['name'] === 'project_inquiry') {
                $has_project_inquiry = true;
                break;
            }
        }
        if (!$has_project_inquiry) {
            $menu[] = array(
                "name" => "project_inquiry",
                "url" => "project_inquiry/list_submissions",
                "class" => "project-inquiry-list",
                "icon" => "file-text",
                "custom_class" => "",
                "target" => "",
                "is_sub_menu" => 0,
                "sort" => 7,
                "title" => app_lang("project_inquiries")
            );
        }
    }
    ?>
    
    <ul class="main-menu">
        <li class="<?php echo ($left_menu && $left_menu->get_active_menu($menu) === 'dashboard') ? 'active' : ''; ?>">
            <a href="<?php echo $dashboard_link; ?>">
                <i data-feather="home" class="icon-16"></i>
                <span><?php echo app_lang('dashboard'); ?></span>
            </a>
        </li>
        <?php
        // Render menu items
        if (!empty($menu) && is_array($menu)) {
            foreach ($menu as $item) {
                $url = isset($item["url"]) ? $item["url"] : "";
                $class = isset($item["class"]) ? $item["class"] : "";
                $name = isset($item["name"]) ? $item["name"] : "";
                $icon = isset($item["icon"]) ? $item["icon"] : "";
                $title = isset($item["title"]) ? app_lang($item["title"]) : "";

                if ($url && $name && !$item["is_sub_menu"]) {
                    $active = (get_active_menu($this->router) === $name) ? 'active' : '';
                    echo "<li class='$class $active'>";
                    echo "<a href='" . get_uri($url) . "'>";
                    if ($icon) {
                        echo "<i data-feather='$icon' class='icon-16'></i>";
                    }
                    echo "<span>$title</span>";
                    echo "</a>";
                    echo "</li>";
                }
            }
        }
        ?>
    </ul>
    <a class="sidebar-toggle-btn hide" href="#">
        <i data-feather="x" class="icon mt0"></i>
    </a>
    <div id="left-menu-language-dropdown" class="d-block d-sm-none dropdown float-end">
    </div>

    <a class="sidebar-brand brand-logo" href="<?php echo $dashboard_link; ?>"><img class="dashboard-image" src="<?php echo get_logo_url(); ?>" /></a>
    <a class="sidebar-brand brand-logo-mini" href="<?php echo $dashboard_link; ?>"><img class="dashboard-image" src="<?php echo get_favicon_url(); ?>" /></a>

    <div class="sidebar-scroll">
        <ul id="sidebar-menu" class="sidebar-menu">
            <?php
            foreach ($sidebar_menu as $main_menu) {
                $main_menu_name = get_array_value($main_menu, "name");
                if (!$main_menu_name) {
                    continue;
                }

                $is_custom_menu_item = get_array_value($main_menu, "is_custom_menu_item");
                $open_in_new_tab = get_array_value($main_menu, "open_in_new_tab");
                $url = get_array_value($main_menu, "url");
                $class = get_array_value($main_menu, "class");
                $custom_class = get_array_value($main_menu, "custom_class");
                $submenu = get_array_value($main_menu, "submenu");

                $has_any_submenu = false;
                if ($submenu && count($submenu)) {
                    foreach ($submenu as $s_menu) {
                        if ($s_menu && count($s_menu)) {
                            $has_any_submenu = true;
                        }
                    }

                    if (!$has_any_submenu) {
                        $submenu = "";
                    }
                }

                $expend_class = $submenu ? " expand " : "";
                $active_class = get_array_value($main_menu, "is_active_menu") ? "active" : "";

                $submenu_open_class = "";
                if ($expend_class && $active_class) {
                    $submenu_open_class = " open ";
                }

                if ($is_custom_menu_item) {
                    $language_key = get_array_value($main_menu, "language_key");
                    if ($language_key) {
                        $main_menu_name = app_lang($language_key);
                    }
                } else {
                    $main_menu_name = app_lang($main_menu_name);
                }

                $badge = get_array_value($main_menu, "badge");
                $badge_class = get_array_value($main_menu, "badge_class");
                $target = ($is_custom_menu_item && $open_in_new_tab) ? "target='_blank'" : "";
                ?>

                <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " "; ?> main">
                    <a <?php echo $target; ?> href="<?php echo $is_custom_menu_item ? $url : get_uri($url); ?>">
                        <i data-feather="<?php echo $class; ?>" class="icon"></i>
                        <span class="menu-text <?php echo $custom_class; ?>"><?php echo $main_menu_name; ?></span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge rounded-pill $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
                    <?php
                    if ($submenu) {
                        echo "<ul>";
                        foreach ($submenu as $s_menu) {
                            $s_menu_name = get_array_value($s_menu, "name");
                            if (!$s_menu_name) {
                                continue;
                            }

                            $is_custom_menu_item = get_array_value($s_menu, "is_custom_menu_item");
                            $url = get_array_value($s_menu, "url");

                            if ($is_custom_menu_item) {
                                $language_key = get_array_value($s_menu, "language_key");
                                if ($language_key) {
                                    $s_menu_name = app_lang($language_key);
                                }
                            } else {
                                $s_menu_name = app_lang($s_menu_name);
                            }

                            if ($s_menu_name) {
                                $open_in_new_tab = get_array_value($s_menu, "open_in_new_tab");
                                $sub_menu_target = ($is_custom_menu_item && $open_in_new_tab) ? "target='_blank'" : "";
                                ?>
                                <li>
                                    <a <?php echo $sub_menu_target; ?> href="<?php echo $is_custom_menu_item ? $url : get_uri($url); ?>">
                                        <i data-feather='minus' width='12'></i>
                                        <span><?php echo $s_menu_name; ?></span>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        echo "</ul>";
                    }
                    ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div><!-- sidebar menu end -->

<script type='text/javascript'>
    feather.replace();

    $(document).ready(function () {
        $("#sidebar-menu li").click(function(){
            $("#sidebar-menu li.active").removeClass("active");
        });
    });
</script>

<?php if (isset($left_menu)): ?>
    <!-- Render the left menu -->
    <?= $left_menu ?>
<?php else: ?>
    <!-- Handle the case where $left_menu is not set -->
    <p>No menu available.</p>
<?php endif; ?>
