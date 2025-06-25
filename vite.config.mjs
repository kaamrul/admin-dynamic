import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel([
            'resources/js/app.js',
            'resources/admin_assets/js/select2.js',

            // Admin Main
            'resources/admin_assets/sass/app.scss',
            'resources/admin_assets/js/app.js',

            // Public Main
            'resources/public_assets/sass/app.scss',
            'resources/public_assets/js/app.js',
            'resources/public_assets/js/register.js',

            // Employee
            'resources/admin_assets/js/pages/user/employee/index.js',
            'resources/admin_assets/js/pages/user/employee/show.js',

            // Driver
            'resources/admin_assets/js/pages/user/driver/index.js',
            'resources/admin_assets/js/pages/user/driver/show.js',
            'resources/admin_assets/js/pages/user/driver/dog.js',
            'resources/admin_assets/js/pages/user/driver/van.js',
            'resources/admin_assets/js/pages/user/driver/walk_list.js',

            // Customer
            'resources/admin_assets/js/pages/user/customer/index.js',
            'resources/admin_assets/js/pages/user/customer/show.js',
            'resources/admin_assets/js/pages/user/customer/dog.js',
            'resources/admin_assets/js/pages/user/customer/purchase.js',

            // Customer Note
            'resources/admin_assets/js/pages/user/customer/note/create.js',

            // Product
            'resources/admin_assets/js/pages/product/index.js',
            'resources/admin_assets/js/pages/product/create.js',

            // // Address
            // 'resources/admin_assets/js/pages/address/autofill.js',
            // 'resources/admin_assets/js/pages/address/index.js',

            // Config
            'resources/admin_assets/js/pages/config/alert/index.js',

            'resources/admin_assets/js/pages/config/dropdown/index.js',
            'resources/admin_assets/js/pages/config/dropdown/list.js',

            'resources/admin_assets/js/pages/config/email/index.js',

            'resources/admin_assets/js/pages/config/email_signature/index.js',
            'resources/admin_assets/js/pages/config/email_signature/update.js',

            'resources/admin_assets/js/pages/config/email_template/index.js',
            'resources/admin_assets/js/pages/config/email_template/update.js',

            'resources/admin_assets/js/pages/config/role/index.js',

            'resources/admin_assets/js/pages/config/service/create.js',
            'resources/admin_assets/js/pages/config/service/index.js',

            'resources/admin_assets/js/pages/config/location/index.js',

            // Purchase
            'resources/admin_assets/js/pages/purchase/index.js',
            'resources/admin_assets/js/pages/purchase/create.js',

            //===== Employee Start ======//
            'resources/admin_assets/js/pages/employee/index.js',
            'resources/admin_assets/js/pages/employee/create.js',
            'resources/admin_assets/js/pages/employee/update.js',
            'resources/admin_assets/js/pages/employee/show.js',
            'resources/admin_assets/js/pages/employee/ticket/index.js',
            // Employee Attachment
            'resources/admin_assets/js/pages/employee/attachment/index.js',
            // Employee Ticket
            'resources/admin_assets/js/pages/employee/ticket/index.js',

            // Asset Assigned
            'resources/admin_assets/js/pages/employee/ams/index.js',

            'resources/admin_assets/js/jquery.easing.js',
            //===== Employee End ======//

            // Logs
            'resources/admin_assets/js/pages/logs/activity_log.js',
            'resources/admin_assets/js/pages/logs/login_history.js',
            'resources/admin_assets/js/pages/logs/email_history.js',


            // Notifications
            'resources/admin_assets/js/pages/notification/index.js',
            'resources/admin_assets/js/pages/notification/create.js',
            'resources/admin_assets/js/pages/notification/show.js',

            //Profile
            'resources/admin_assets/js/pages/profile/all_nofification.js',

            // Tickets
            'resources/admin_assets/js/pages/ticket/index.js',
            'resources/admin_assets/js/pages/ticket/create.js',
            'resources/admin_assets/js/pages/ticket/show.js',
            'resources/admin_assets/js/pages/member/show.js',
            'resources/admin_assets/js/pages/ticket/all.js',

            // fish_species
            // 'resources/admin_assets/js/pages/fish_species/index.js',
            // 'resources/admin_assets/js/pages/fish_species/create.js',

            // Tournament
            'resources/admin_assets/js/pages/tournament/index.js',
            'resources/admin_assets/js/pages/tournament/create.js',

            //Blog
            'resources/admin_assets/js/pages/website/blog/create.js',
            'resources/admin_assets/js/pages/website/blog/index.js',
            'resources/admin_assets/js/pages/website/slider/index.js',

            //Pages
            'resources/admin_assets/js/pages/website/page/create.js',
            'resources/admin_assets/js/pages/website/page/index.js',

            // Territory
            'resources/admin_assets/js/pages/territory/index.js',

            //Dog
            'resources/admin_assets/js/pages/dog/index.js',
            'resources/admin_assets/js/pages/dog/create.js',
            'resources/admin_assets/js/pages/dog/booking.js',

            //Dog Note
            'resources/admin_assets/js/pages/dog/note/create.js',

            //Van
            'resources/admin_assets/js/pages/van/index.js',
            'resources/admin_assets/js/pages/van/create.js',
            'resources/admin_assets/js/pages/van/dog_list.js',
            'resources/admin_assets/js/pages/van/driver_list.js',
            'resources/admin_assets/js/pages/van/booking_list.js',

            // File Upload
            'resources/admin_assets/js/pages/website/file_upload/index.js',

            // Session
            'resources/admin_assets/js/pages/session/index.js',
            'resources/admin_assets/js/pages/session/create.js',
            'resources/admin_assets/js/pages/session/show.js',

            // Booking
            'resources/admin_assets/js/pages/booking/index.js',
            'resources/admin_assets/js/pages/booking/create.js',
            // Driver Note
            'resources/admin_assets/js/pages/user/driver/note/create.js',

            // Van Note
            'resources/admin_assets/js/pages/van/note/create.js',

            // List of Territory Vans
            'resources/admin_assets/js/pages/config/moreSettings/van/index.js',

            // List of Territory Drivers
            'resources/admin_assets/js/pages/config/moreSettings/driver/index.js',

            // List of Territory Dogs
            'resources/admin_assets/js/pages/config/moreSettings/dog/index.js',

            // List of Territory Customers
            'resources/admin_assets/js/pages/config/moreSettings/customer/index.js',

            // List of Territory Bookings
            'resources/admin_assets/js/pages/config/moreSettings/booking/index.js',
            
            // Contact Message
            'resources/admin_assets/js/pages/contact_us/index.js',

            // Report
            'resources/admin_assets/js/pages/report/booking.js',
            'resources/admin_assets/js/pages/report/purchase.js',
        ]),
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '@': '/resources/js',
        }
    },
    build: {
        rollupOptions: {
            output: {
                assetFileNames: (asset) => {
                    let typePath = 'styles'
                    const type = asset.name.split('.').at(1)
                    if (/png|jpe?g|webp|svg|gif|tiff|bmp|ico/i.test(type)) {
                        typePath = 'images'
                    }
                    return `${typePath}/[name]-[hash][extname]`
                },
                chunkFileNames: 'scripts/chunks/[name]-[hash].js',
                entryFileNames: 'scripts/[name]-[hash].js',
            },
        },
    },
});
