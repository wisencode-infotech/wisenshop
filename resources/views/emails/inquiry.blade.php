<x-mail::message>

# New Inquiry Received

You have received a new inquiry from {{ $inquiry['name'] }}.

**Subject:** {{ $inquiry['subject'] }}

**Email:** {{ $inquiry['email'] }}

**Message:**
{{ $inquiry['description'] }}

@include('emails.partials.regards')
</x-mail::message>
