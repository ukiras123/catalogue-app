import React from 'react'
import { Grid2 as Grid, Card, CardContent, Typography, CardMedia, CardHeader } from '@mui/material';

export default function Home({ content }) {
    return (
        <Grid container>
            {content.map((item, index) => (
                <Grid key={item.id}>
                    <Card sx={{ backgroundColor: `${item.color}` }}>
                        <CardHeader title={item.title}/>
                        <CardMedia
                            component="img"
                            height="140"
                            image={item.imageURL}
                            alt={item.title}
                        />
                        <CardContent>
                            <Typography variant="body2" color="textSecondary">
                                {item.description}
                            </Typography>
                        </CardContent>
                    </Card>
                </Grid>
            ))}
        </Grid>
    )
}

