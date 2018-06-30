<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/28/18
 * Time: 10:45 AM
 */

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Task
 * @property string $task
 * @property \DateTime $dueDate
 * @package App\Entity
 */
class Task
{

    /**
     * @Assert\NotBlank()
     */
    protected $task;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueDate;

    /**
     * @return string
     */
    public function getTask(): string
    {
        return $this->task;
    }

    /**
     * @param string $task
     */
    public function setTask($task): void
    {
        $this->task = $task;
    }


    /**
     * @return \DateTime
     */
    public function getDueDate(): \DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $dueDate
     */
    public function setDueDate(\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }


}