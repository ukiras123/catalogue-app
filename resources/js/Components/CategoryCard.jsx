import { Card, CardContent, CardHeader, CardMedia, Chip, Divider, Grid2 as Grid, Typography } from '@mui/material'
import React from 'react'

const descriptionStyle = {
    minHeight: '100px',
    maxHeight: '100px',
    overflow: 'hidden',
    overflowY: 'auto',
  };


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
                <Grid container justifyContent="space-between">
                    <Chip color='primary' label={item.contentType} />
                    {item?.contentStatus && <Typography variant="caption">{`Status: ${item.contentStatus}`}</Typography>}
                </Grid>
                <Divider sx={{ my: 2 }} />
                <Typography variant="body2" color="textSecondary" sx={descriptionStyle}>
                    {item.description}
                </Typography>
            </CardContent>
        </Card>
    )
}

export default CategoryCard
