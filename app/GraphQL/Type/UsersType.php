<?php

namespace App\GraphQL\Type;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class UsersType
 */
class UsersType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Users',
        'description' => 'A type',
        'model' => User::class,
    ];

    /**
     * Define field of type
     *
     * @return array
     */
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user'
            ],
            // field relation to model user_profiles
            'user_profiles' => [
                'type' => GraphQL::type('user_profiles'),
                'description' => 'The profile of the user'
            ]
        ];
    }

    /**
     * Resolver function
     *
     * @param $root
     * @param $args
     *
     * @return string
     */
    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}