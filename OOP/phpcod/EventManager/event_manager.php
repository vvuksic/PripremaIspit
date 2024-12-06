<?php

enum EventType: string {
    case Conference = "Konferencija";
    case Seminar = "Seminar";
    case Workshop = "Radionica";
}

enum EventStatus: string {
    case Planned = "Planiran";
    case Confirmed = "Potvrđen";
    case Canceled = "Otkazan";
}

enum ParticipantStatus: string {
    case Accepted = "Prihvaćen";
    case Declined = "Odbijen";
    case Pending = "Na čekanju";
}

interface Confirmable{
    public function confirm(): void;
    public function cancel(): void;
}

interface Sortable {
    function sortBy (string $field): mixed;
}

abstract class Person{
    protected int $id;
    protected string $firstName;
    protected string $lastName;

    public function __construct(string $firstName, string $lastName){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getFirstName(): string{
        return $this->firstName;
    }

    public function getLastName(): string{
        return $this->lastName;
    }
}

class Participant extends Person{
    static private int $nextId = 1;
    private ParticipantStatus $status;

    public function __construct(string $firstName, string $lastName){
        parent::__construct($firstName, $lastName);
        $this->id = self::$nextId++;
        $this->status = ParticipantStatus::Pending;
    }

    public function getStatus(): ParticipantStatus{
        return $this->status;
    }

    public function setStatus(ParticipantStatus $status): void{
        $this->status = $status;
    }
}

class Organizer extends Person{
    static private int $nextId = 1;
    private array $events = [];

    public function __construct(string $firstName, string $lastName){
        parent::__construct($firstName, $lastName);
        $this->id = self::$nextId++;
    }

    public function addEvent(Confirmable $event): void{
        $this->events[] = $event;
    }

    public function confirmEvent(Confirmable $event): void{
        if(in_array($event, $this->events)){
            $event->confirm();
        }
    }
    public function getEvents(): array
    {
        return $this->events;
    
    }
}

class Event implements Confirmable, Sortable{
    static private int $nextId = 1;
    private int $id;
    private string $name;
    private EventType $type;
    private EventStatus $status;
    private DateTime $startDate;
    private array $participants = [];
    private bool $isApproved = false;

    public function __construct(string $name, EventType $type, DateTime $startDate){
        $this->name = $name;
        $this->type = $type;
        $this->startDate = $startDate;
        $this->status = EventStatus::Planned;
        $this->id = self::$nextId++;
    }

    public function confirm(): void{
        $this->status = EventStatus::Confirmed;
    }

    public function cancel(): void{
        $this->status = EventStatus::Canceled;

    
   
    }

    public function sortBy(string $field): mixed{
        return $this->$field;
        
    }   
   
}

class Cajanka implements Confirmable{
    private EventStatus $status = EventStatus::Planned;

    public function confirm(): void{
        $this->status = EventStatus::Confirmed;
    }

    public function cancel(): void{
        $this->status = EventStatus::Canceled;
    }
}


$o1 = new Organizer("John", "Doe");
$e1 = new Event("PHP Konferencija", EventType::Conference, new DateTime("2022-10-10"));
$e2 = new Event("JavaScript Radionica", EventType::Workshop, new DateTime("2022-11-11"));
$o1->addEvent($e1);
$o1->addEvent($e2);
$o1->confirmEvent($e1);
//$o1->addEvent($c1);

$events=$o1->getEvents();
var_dump($events);
usort ($events, fn(sortable $a,sortable $b)=> $a->sortBy('name')<=>$b->sortBy('name'));
var_dump($events);





