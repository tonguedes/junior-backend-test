<?php
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateContactsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_should_be_able_to_create_a_new_contact()
    {
        $this->actingAs(User::factory()->create());

        $data = [
            'name' => 'João Teste',
            'email' => 'joao@example.com',
            'phone' => '(16) 99999-9999',
        ];

        $response = $this->post('/contacts', $data);

        $response->assertRedirect(route('contacts.index'));

        $this->assertDatabaseHas('contacts', [
            'name' => 'João Teste',
            'email' => 'joao@example.com',
        ]);
    }

    public function test_it_should_validate_information()
    {
        $this->actingAs(User::factory()->create());

        $data = [
            'name' => '',
            'email' => 'not-an-email',
            'phone' => '',
        ];

        $response = $this->post('/contacts', $data);

        $response->assertSessionHasErrors(['name', 'email']);
    }
}
