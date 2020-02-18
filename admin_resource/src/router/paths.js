/**
 * Define all of your application routes here
 * for more information on routes, see the
 * official documentation https://router.vuejs.org/en/
 */
export default [{
        path: '/users',
        name: 'users',
        view: 'Users/List'
    },
    {
        path: '/users/create',
        name: 'users.create',
        view: 'Users/Create'
    },
    {
        path: '/users/edit/:user(\\d+)',
        name: 'users.edit',
        view: 'Users/Edit',
    },
    {
        path: '/statisticals',
        name: 'Statisticals',
        view: 'Statisticals/List'
    },
    {
        path: '/subscribers',
        name: 'subscribers',
        view: 'Subscribers/List'
    },
    {
        path: '/customercontacts',
        name: 'customercontacts',
        view: 'CustomerContacts/List'
    },
    {
        path: '/pages',
        name: 'pages',
        view: 'Pages/List'
    },
    {
        path: '/pages/create',
        name: 'pages.create',
        view: 'Pages/Create'
    },
    {
        path: '/pages/edit/:page(\\d+)',
        name: 'pages.edit',
        view: 'Pages/Edit',
    },
    {
        path: '/posts',
        name: 'posts',
        view: 'Posts/List'
    },
    {
        path: '/posts/create',
        name: 'posts.create',
        view: 'Posts/Create'
    },
    {
        path: '/posts/edit/:post(\\d+)',
        name: 'posts.edit',
        view: 'Posts/Edit',
    },
    {
        path: '/projects',
        name: 'projects',
        view: 'Projects/List'
    },
    {
        path: '/projects/create',
        name: 'projects.create',
        view: 'Projects/Create'
    },
    {
        path: '/projects/edit/:project(\\d+)',
        name: 'projects.edit',
        view: 'Projects/Edit',
    },
    {
        path: '/services',
        name: 'services',
        view: 'Services/List'
    },
    {
        path: '/services/create',
        name: 'services.create',
        view: 'Services/Create'
    },
    {
        path: '/services/edit/:service(\\d+)',
        name: 'services.edit',
        view: 'Services/Edit',
    },
    {
        path: '/testimonials',
        name: 'testimonials',
        view: 'Testimonials/List'
    },
    {
        path: '/testimonials/create',
        name: 'testimonials.create',
        view: 'Testimonials/Create'
    },
    {
        path: '/testimonials/edit/:testimonial(\\d+)',
        name: 'testimonials.edit',
        view: 'Testimonials/Edit',
    },
    {
        path: '/slides/create',
        name: 'Create Slide',
        view: 'Slides/Create'
    },
    {
        path: '/slides/edit/:id(\\d+)',
        name: 'Edit Slide',
        view: 'Slides/Edit',
    },
    {
        path: '/categories',
        name: 'categories',
        view: 'Categories/List'
    },
    {
        path: '/categories/create',
        name: 'categories.create',
        view: 'Categories/Create'
    },
    {
        path: '/categories/edit/:category(\\d+)',
        name: 'categories.edit',
        view: 'Categories/Edit'
    },
    {
        path: '/settings',
        name: 'settings',
        view: 'Settings/List'
    },
    {
        path: '/settings/create',
        name: 'settings.create',
        view: 'Settings/Create'
    },
    {
        path: '/settings/edit/:setting(\\d+)',
        name: 'settings.edit',
        view: 'Settings/Edit'
    },
    {
        path: '/media/files',
        name: 'Files',
        view: 'Media/Files'
    },
    {
        path: '/media/images',
        name: 'Images',
        view: 'Media/Images'
    },
    {
        path: '/login',
        name: 'Login',
        view: 'Login'
    },
    {
        path: '/tags',
        name: 'Tags',
        view: 'Posts/Tag'
    },
    {
        path: '/projectcategories',
        name: 'projectcategories',
        view: 'ProjectCategories/List'
    },
    {
        path: '/projectcategories/create',
        name: 'projectcategories.create',
        view: 'ProjectCategories/Create'
    },
    {
        path: '/projectcategories/edit/:projectcategorie(\\d+)',
        name: 'projectcategories.edit',
        view: 'ProjectCategories/Edit'
    },
    {
        path: '/employees',
        name: 'employees',
        view: 'Employees/List'
    },
    {
        path: '/employees/create',
        name: 'employees.create',
        view: 'Employees/Create'
    },
    {
        path: '/employees/edit/:employee(\\d+)',
        name: 'employees.edit',
        view: 'Employees/Edit',
    },
    {
        path: '/custommers',
        name: 'custommers',
        view: 'Custommers/List'
    },
    {
        path: '/custommers/create',
        name: 'custommers.create',
        view: 'Custommers/Create'
    },
    {
        path: '/custommers/edit/:custommer(\\d+)',
        name: 'custommers.edit',
        view: 'Custommers/Edit',
    },
    {
        path: '/prices',
        name: 'prices',
        view: 'Prices/List'
    },
    {
        path: '/prices/create',
        name: 'prices.create',
        view: 'Prices/Create'
    },
    {
        path: '/prices/edit/:price(\\d+)',
        name: 'prices.edit',
        view: 'Prices/Edit',
    },
    {
        path: '/recruitments',
        name: 'recruitments',
        view: 'Recruitments/List'
    },
    {
        path: '/recruitments/create',
        name: 'recruitments.create',
        view: 'Recruitments/Create'
    },
    {
        path: '/recruitments/edit/:recruitment(\\d+)',
        name: 'recruitments.edit',
        view: 'Recruitments/Edit',
    },
    {
        path: '/settingmenus/create',
        name: 'settingmenus.edit',
        view: 'SettingMenus/Create'
    },
    {
        path: '/settingmenus/edit/:settingmenu(\\d+)',
        name: 'settingmenus.edit',
        view: 'SettingMenus/Edit',
    },
]