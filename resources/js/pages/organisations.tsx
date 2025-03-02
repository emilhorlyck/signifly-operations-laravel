import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Organisations',
        href: '/organisations',
    },
];


export default function Organisations({organisations}: {organisations: Organisation[]}) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Organisations" />

            <div className="flex items-center gap-2 rounded-lg border p-4 shadow-sm">
                <div className="text-2xl font-semibold">{organisations.length}</div>
                <div className="text-muted-foreground">Total Organizations</div>
            </div>

            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    {organisations.map((org) => (
                        <Link href={route('organisation', {id: org.id})} key={org.id}>
                            <Card>
                                <CardHeader>
                                    <CardTitle>{org.name}</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="text-sm text-muted-foreground">ID: {org.notion_id}</div>
                                </CardContent>
                            </Card>
                        </Link>
                    ))}
                </div>
            </div>
            
        </AppLayout>
    );
}