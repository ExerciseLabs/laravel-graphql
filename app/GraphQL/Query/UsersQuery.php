<?php

namespace App\GraphQL\Query;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class UsersQuery
 */
class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'Users Query',
        'description' => 'A query of users',
    ];


    /**
     * Result of query with pagination laravel
     *
     * @return mixed
     */
    public function type()
    {
        return GraphQL::paginate('users');
    }

    /**
     * Arguememnts to filter query
     *
     * @return array
     */
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ]
        ];
    }

    /**
     * Resolver function
     *
     * @param $root
     * @param $args
     * @param SelectFields $fields
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id', $args['id']);
            }

            if (isset($args['email'])) {
                $query->where('email', $args['email']);
            }
        };

        $user = User::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate();

        return $user;
    }
}