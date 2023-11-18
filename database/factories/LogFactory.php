<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
final class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level' => $this->faker->randomElement(
                array: ['debug', 'info', 'notice', 'warning', 'error', 'critical', 'alert', 'emergency']
            ),
            'message' => $this->faker->sentence,
            'resourceId' => 'server-' . Random::generate(length: 4, charlist: '0-9'),
            'timestamp' => $this->faker->dateTimeThisYear->format(format: 'Y-m-d\TH:i:s\Z'),
            'traceId' => Random::generate(length: 3, charlist: 'a-z') . '-' .
                Random::generate(length: 3, charlist: 'a-z') . '-' .
                Random::generate(length: 3, charlist: '0-9'),
            'spanId' => 'span-' . Random::generate(length: 3, charlist: '0-9'),
            'commit' => $this->faker->sha1,
            'metadata' => [
                'ip' => $this->faker->ipv4,
                'userAgent' => $this->faker->userAgent,
                'referer' => $this->faker->url,
                'parentResourceId' => 'server-' . Random::generate(length: 4, charlist: '0-9'),
            ],
        ];
    }
}
