<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RaccoonUserRepository")
 */
class RaccoonUser implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $weight;

    /**
     * @ORM\Column(type="text")
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RaccoonEntry", mappedBy="author", orphanRemoval=true)
     */
    private $raccoonEntries;

    public function __construct()
    {
        $this->raccoonEntries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }
	
	/**
	* A visual identifier that represents this user.
	*
	* @see UserInterface
	*/
	public function getUsername(): ?string
                                       	{
                                       		return $this->email;
                                       	}
	
	public function getSalt()
                                       	{
                                       		// not needed for apps that do not check user passwords
                                       	}
	
	public function eraseCredentials()
                                       	{
                                       		// If you store any temporary, sensitive data on the user, clear it here
                                       		//$this->plainPassword = null;
                                       	}
	/**
	* @see UserInterface
	*/
	public function getRoles(): array
                                       	{
                                       		//$roles = $this->roles;
                                       		// guarantee every user at least has ROLE_USER
                                       		$roles[] = 'DEFAULT_ROLE_USER';
                                       		return array_unique($roles);
                                       	}
	
	public function getPassword(){}

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|RaccoonEntry[]
     */
    public function getRaccoonEntries(): Collection
    {
        return $this->raccoonEntries;
    }

    public function addRaccoonEntry(RaccoonEntry $raccoonEntry): self
    {
        if (!$this->raccoonEntries->contains($raccoonEntry)) {
            $this->raccoonEntries[] = $raccoonEntry;
            $raccoonEntry->setAuthor($this);
        }

        return $this;
    }

    public function removeRaccoonEntry(RaccoonEntry $raccoonEntry): self
    {
        if ($this->raccoonEntries->contains($raccoonEntry)) {
            $this->raccoonEntries->removeElement($raccoonEntry);
            // set the owning side to null (unless already changed)
            if ($raccoonEntry->getAuthor() === $this) {
                $raccoonEntry->setAuthor(null);
            }
        }

        return $this;
    }
}
