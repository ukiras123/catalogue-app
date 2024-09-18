import { Box, Container, Divider, Grid2, Stack, Typography } from '@mui/material'
import React from 'react'

function CategoryLayout({children, title}) {
  return (
    <Container maxWidth="lg">
        <Box sx={{ width: '100%', textAlign: 'center' }}>
            <Typography variant="h4" component="h1">{title}</Typography>
            <Divider sx={{ my: 2 }}/>
        </Box>
        {children}
    </Container>
  )
}

export default CategoryLayout
