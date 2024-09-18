import React from 'react'
import { Grid2 as Grid, Card, CardContent, Typography, CardMedia, CardHeader, Container } from '@mui/material';
import CategoryCard from '../Components/CategoryCard';
import CategoryLayout from '../Layouts/CategoryLayout';
import { Head } from '@inertiajs/react';

export default function Home({ content }) {
    return (
        <CategoryLayout title={"Browse Categories"}>
            <Head title="Home" />
            <Grid container spacing={{ xs: 2, md: 3 }} justifyContent={"center"}>
                {content.map((item) => (
                    <Grid size={{ xs: 8, sm: 6, md: 4, lg: 3, xl: 2 }} key={item.id}>
                        <CategoryCard item={item} />
                    </Grid>
                ))}
            </Grid>
        </CategoryLayout>
    )
}

