import { Card, CardContent, CardHeader, CardMedia, Chip, Grid2, Typography } from '@mui/material'
import React from 'react'

function CategoryCard({ item }) {

    const placeHolderImg = 'images/categoryPlaceholder.jpg';
    return (
        <Card sx={{ backgroundColor: `${item.color}` }}>
            <CardHeader title={item.title} />
            <CardMedia
                component="img"
                height="140"
                image={item.imageURL || placeHolderImg}
                alt={item.title}
            />
            <CardContent>
                <Typography variant="body2" color="textSecondary">
                    {item.description}
                </Typography>
            </CardContent>
        </Card>
    )
}

export default CategoryCard
