import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Organisations',
        href: '/organisations',
    },
];


const orgs = [
    {
        name: 'Organisation 1',
        notion_id: '123',
    },
    {
        name: 'Organisation 2',
        notion_id: '456',
    },
];


export default function Organisations() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Organisations" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    {orgs.map((org) => (
                        <Link href={`/${org.notion_id}`} className="flex flex-col gap-2 rounded-lg border p-4 shadow-sm hover:bg-muted/50">
                        <div className="flex flex-col gap-2 rounded-lg border p-4 shadow-sm">
                            <div className="flex items-center justify-between">
                                <div className="font-medium">{org.name}</div>
                                <PlaceholderPattern className="h-8 w-8" />
                            </div>
                            <div className="text-sm text-muted-foreground">ID: {org.notion_id}</div>
                            </div>
                        </Link>
                    ))}
                </div>
            </div>
        </AppLayout>
    );
}