import React from 'react'
import { createInertiaApp } from '@inertiajs/react'
import { createRoot } from 'react-dom/client'

const appName = import.meta.env.VITE_APP_NAME || 'Catalogue';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true })
        return pages[`./Pages/${name}.jsx`]
    },

    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />)
    },
})
