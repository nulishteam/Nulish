<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request)
    {
        return view('contact');
    }
    // Store Contact Form data
    public function ContactForm(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Get the form data
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Save the form data to the database
        $contact = Contact::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
        ]);

        // Send a confirmation email to the user
        $to = $email;
        $subject = "Contact Form Submission Confirmation";
        $message = "Dear $name,

        Thank you for contacting us. Your message has been received and will be reviewed by our team.

        We will get back to you as soon as possible.

        Sincerely,
        The Nulish Team";

        mail($to, $subject, $message);

        // Flash a success message to the session
        session()->flash('success', 'Your message has been sent!');

        return redirect()->route('contact.store');

    }
}
