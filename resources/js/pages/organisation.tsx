import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Organisations',
        href: '/organisations',  
    },
    {
        title: 'organisation details',
        href: '/organisation',
    }
    
];

export default function Organisation({organisation}: {organisation: Organisation}) {
    return <AppLayout breadcrumbs={breadcrumbs}>
        <Head title={organisation.name} />

        <div className="flex items-center gap-2 rounded-lg border p-4 shadow-sm">
            <div className="text-2xl font-semibold">{organisation.name}</div>
            <div className="text-muted-foreground">ID: {organisation.notion_id}</div>
        </div>
    </AppLayout>;
}