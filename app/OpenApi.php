<?php

namespace App;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Perpustakaan API',
    description: 'REST API Laravel untuk sistem perpustakaan.'
)]
#[OA\Server(
    url: 'http://127.0.0.1:8000',
    description: 'Local Development Server'
)]
#[OA\SecurityScheme(
    securityScheme: 'sanctum',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'Sanctum Token',
    description: 'Masukkan token Sanctum tanpa menambahkan kata Bearer.'
)]
#[OA\Tag(
    name: 'Auth',
    description: 'Autentikasi pengguna'
)]
#[OA\Tag(
    name: 'Books',
    description: 'CRUD data buku'
)]
#[OA\Get(
    path: '/api/books',
    tags: ['Books'],
    summary: 'Menampilkan daftar buku',
    security: [
        ['sanctum' => []]
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Daftar buku berhasil diambil'
        ),
        new OA\Response(
            response: 401,
            description: 'Tidak terautentikasi'
        )
    ]
)]
#[OA\Post(
    path: '/api/books',
    tags: ['Books'],
    summary: 'Menambahkan buku',
    security: [
        ['sanctum' => []]
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: [
                'title',
                'author',
                'isbn',
                'published_year',
                'stock'
            ],
            properties: [
                new OA\Property(
                    property: 'title',
                    type: 'string',
                    example: 'Laskar Pelangi'
                ),
                new OA\Property(
                    property: 'author',
                    type: 'string',
                    example: 'Andrea Hirata'
                ),
                new OA\Property(
                    property: 'publisher',
                    type: 'string',
                    example: 'Bentang Pustaka'
                ),
                new OA\Property(
                    property: 'isbn',
                    type: 'string',
                    example: '9789793062792'
                ),
                new OA\Property(
                    property: 'published_year',
                    type: 'integer',
                    example: 2005
                ),
                new OA\Property(
                    property: 'stock',
                    type: 'integer',
                    example: 10
                ),
                new OA\Property(
                    property: 'description',
                    type: 'string',
                    example: 'Novel tentang anak-anak Belitung.'
                )
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 201,
            description: 'Buku berhasil dibuat'
        ),
        new OA\Response(
            response: 422,
            description: 'Validasi gagal'
        ),
        new OA\Response(
            response: 401,
            description: 'Tidak terautentikasi'
        )
    ]
)]
#[OA\Get(
    path: '/api/books/{book}',
    tags: ['Books'],
    summary: 'Menampilkan detail buku',
    security: [
        ['sanctum' => []]
    ],
    parameters: [
        new OA\Parameter(
            name: 'book',
            description: 'ID buku',
            in: 'path',
            required: true,
            schema: new OA\Schema(
                type: 'integer'
            ),
            example: 1
        )
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Detail buku berhasil diambil'
        ),
        new OA\Response(
            response: 404,
            description: 'Buku tidak ditemukan'
        ),
        new OA\Response(
            response: 401,
            description: 'Tidak terautentikasi'
        )
    ]
)]
#[OA\Put(
    path: '/api/books/{book}',
    tags: ['Books'],
    summary: 'Mengubah data buku',
    security: [
        ['sanctum' => []]
    ],
    parameters: [
        new OA\Parameter(
            name: 'book',
            description: 'ID buku',
            in: 'path',
            required: true,
            schema: new OA\Schema(
                type: 'integer'
            ),
            example: 1
        )
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'title',
                    type: 'string',
                    example: 'Laskar Pelangi Updated'
                ),
                new OA\Property(
                    property: 'author',
                    type: 'string',
                    example: 'Andrea Hirata'
                ),
                new OA\Property(
                    property: 'publisher',
                    type: 'string',
                    example: 'Bentang Pustaka'
                ),
                new OA\Property(
                    property: 'isbn',
                    type: 'string',
                    example: '9789793062792'
                ),
                new OA\Property(
                    property: 'published_year',
                    type: 'integer',
                    example: 2005
                ),
                new OA\Property(
                    property: 'stock',
                    type: 'integer',
                    example: 15
                ),
                new OA\Property(
                    property: 'description',
                    type: 'string',
                    example: 'Deskripsi buku.'
                )
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 200,
            description: 'Buku berhasil diperbarui'
        ),
        new OA\Response(
            response: 404,
            description: 'Buku tidak ditemukan'
        ),
        new OA\Response(
            response: 422,
            description: 'Validasi gagal'
        )
    ]
)]
#[OA\Delete(
    path: '/api/books/{book}',
    tags: ['Books'],
    summary: 'Menghapus buku',
    security: [
        ['sanctum' => []]
    ],
    parameters: [
        new OA\Parameter(
            name: 'book',
            description: 'ID buku',
            in: 'path',
            required: true,
            schema: new OA\Schema(
                type: 'integer'
            ),
            example: 1
        )
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Buku berhasil dihapus'
        ),
        new OA\Response(
            response: 404,
            description: 'Buku tidak ditemukan'
        ),
        new OA\Response(
            response: 401,
            description: 'Tidak terautentikasi'
        )
    ]
)]
#[OA\Post(
    path: '/api/register',
    tags: ['Auth'],
    summary: 'Registrasi pengguna',
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: [
                'name',
                'email',
                'password',
                'password_confirmation'
            ],
            properties: [
                new OA\Property(
                    property: 'name',
                    type: 'string',
                    example: 'Fadli Hasan'
                ),
                new OA\Property(
                    property: 'email',
                    type: 'string',
                    format: 'email',
                    example: 'fadli@example.com'
                ),
                new OA\Property(
                    property: 'password',
                    type: 'string',
                    format: 'password',
                    example: 'password123'
                ),
                new OA\Property(
                    property: 'password_confirmation',
                    type: 'string',
                    format: 'password',
                    example: 'password123'
                )
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 201,
            description: 'Registrasi berhasil'
        ),
        new OA\Response(
            response: 422,
            description: 'Validasi gagal'
        )
    ]
)]
#[OA\Post(
    path: '/api/login',
    tags: ['Auth'],
    summary: 'Login pengguna',
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: [
                'email',
                'password'
            ],
            properties: [
                new OA\Property(
                    property: 'email',
                    type: 'string',
                    format: 'email',
                    example: 'admin@example.com'
                ),
                new OA\Property(
                    property: 'password',
                    type: 'string',
                    format: 'password',
                    example: 'password'
                ),
                new OA\Property(
                    property: 'device_name',
                    type: 'string',
                    example: 'Swagger'
                )
            ]
        )
    ),
    responses: [
        new OA\Response(
            response: 200,
            description: 'Login berhasil'
        ),
        new OA\Response(
            response: 422,
            description: 'Email atau password salah'
        )
    ]
)]
#[OA\Get(
    path: '/api/me',
    tags: ['Auth'],
    summary: 'Menampilkan profil pengguna yang sedang login',
    security: [
        ['sanctum' => []]
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Profil pengguna berhasil diambil'
        ),
        new OA\Response(
            response: 401,
            description: 'Tidak terautentikasi'
        )
    ]
)]
#[OA\Post(
    path: '/api/logout',
    tags: ['Auth'],
    summary: 'Logout pengguna',
    security: [
        ['sanctum' => []]
    ],
    responses: [
        new OA\Response(
            response: 200,
            description: 'Logout berhasil'
        ),
        new OA\Response(
            response: 401,
            description: 'Tidak terautentikasi'
        )
    ]
)]
class OpenApi
{
    //
}