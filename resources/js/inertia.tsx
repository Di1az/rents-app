import { createInertiaApp } from "@inertiajs/react";

createInertiaApp({
    title: tittle => `Fisher - ${tittle}`,
    pages: {
        path: './Pages',
        extension: '.tsx',
    },
})